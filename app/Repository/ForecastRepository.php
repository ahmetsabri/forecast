<?php

namespace App\Repository;

use App\Conract\ForecastInterface;
use App\Events\ForecastFetched;
use App\Exceptions\BadRequestException;
use App\Models\Forecast;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ForecastRepository implements ForecastInterface
{

    public string $date;
    private string $url;
    private string $apiKey;

    public function __construct(string $date)
    {
        $this->date = $date;
        $this->apiKey = config('services.open_weather.key');
        $this->url = $this->prepareUrl();
    }

    /**
     * pull
     *
     * @return Forecast
     */
    public function pull(): Forecast
    {
        if (!$this->isCallable($this->date)) {
            return $this->getWeatherForecastFromCache();
        }

        $data = $this->getWeatherForecast();
        $forecast =  $this->update(compact('data'));

        event(new ForecastFetched($forecast));

        return $forecast;
    }

    /**
     * update
     *
     * @param  array $data
     * @return Forecast
     */
    public function update(array $data): Forecast
    {
        $forecast = Forecast::updateOrCreate([
            'date' => $this->date
        ], $data);

        return $forecast;
    }

    /**
     * isCallable
     *
     * @return bool
     */
    public function isCallable(): bool
    {
        $cacheName = sprintf(config('constants.cache_keys.call-times-date'), $this->date);

        return !Cache::has($cacheName) || Cache::get($cacheName) < 4;
    }

    /**
     * prepareUrl
     *
     * @return string
     */
    private function prepareUrl(): string
    {
        $url = config('services.open_weather.url');

        if ($this->date == today()->format('Y-m-d')) {
            return $url . 'weather';
        }
        return $url . 'onecall/timemachine';
    }

    /**
     * getWeatherForecast
     *
     * @return array
     */
    public function getWeatherForecast(): array
    {
        $cities = collect(config('constants.cities'));

        return $cities->mapWithKeys(function ($cityDetails, $cityName) {
            $response = $this->makeRequest($cityDetails['lat'], $cityDetails['lon']);
            return [$cityName => $response];
        })->all();
    }

    /**
     * getWeatherForecastFromCache
     *
     * @return Forecast
     */
    public function getWeatherForecastFromCache(): Forecast
    {
        $cacheName = sprintf(config('constants.cache_keys.forecast-date'), $this->date);

        return Cache::remember($cacheName, now()->endOfDay(), function () {
            return Forecast::firstWhere('date', $this->date);
        });
    }

    /**
     * makeRequest
     *
     * @param  string $lat
     * @param  string $lon
     * @return array
     */
    public function makeRequest(string $lat, ?string $lon): array
    {
        $query = $this->prepareQuery($lat, $lon);

        $response = Http::get($this->url, $query);
        if ($response->failed()) {
            Log::error('Error :', [
                'message' => $response->json('message', 'Unknown Message'),
                'code' => $response->json('cod', 'Unknown code'),
            ]);
            throw new BadRequestException('Bad Request');
        }
        return  $response->json();
    }

    /**
     * isDateBelongsToToday
     *
     * @return bool
     */
    public function isDateBelongsToToday(): bool
    {
        return today()->toDateString() == $this->date;
    }

    /**
     * prepareQuery
     *
     * @param  string $lat
     * @param  string $lon
     * @return array
     */
    public function prepareQuery(string $lat, string $lon): array
    {
        $query = array_merge(compact('lat', 'lon'), ['appid' => $this->apiKey]);

        if (!$this->isDateBelongsToToday()) {
            return array_merge($query, ['dt' => strtotime($this->date)]);
        }

        return $query;
    }
}

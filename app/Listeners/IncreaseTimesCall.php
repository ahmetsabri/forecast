<?php

namespace App\Listeners;

use App\Events\ForecastFetched;
use Illuminate\Support\Facades\Cache;

class IncreaseTimesCall
{
    public function handle(ForecastFetched $event)
    {
        $date = $event->getForecast()->date;
        $cacheName = sprintf(config('constants.cache_keys.call-times-date'), $date);
        $callTimes = Cache::get($cacheName);

        if ($callTimes < 4) {
            Cache::increment($cacheName);
        }

    }
}

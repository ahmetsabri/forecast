<?php

namespace App\Http\Requests;

use App\Exceptions\BadRequestException;
use Carbon\CarbonPeriod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FetchForecastRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => [
            'required',
            'date_format:Y-m-d',
            function () {
              if(!$this->isWithinLastFiveDaysOrToday()){
                  throw new BadRequestException('invalid date');
              }
            }]
        ];
    }

    private function isWithinLastFiveDaysOrToday(): bool
    {
        $lastFiveDays = now()->subDays(5)->format('Y-m-d');
        $today = today()->format('Y-m-d');
        return collect(CarbonPeriod::create($lastFiveDays, $today))->map(function($date){
            return $date->format('Y-m-d');
        })->contains($this->date);

    }
}

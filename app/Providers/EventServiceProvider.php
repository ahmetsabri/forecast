<?php

namespace App\Providers;

use App\Events\ForecastFetched;
use App\Listeners\IncreaseTimesCall;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ForecastFetched::class => [
            IncreaseTimesCall::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

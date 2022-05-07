<?php

namespace App\Events;

use App\Models\Forecast;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ForecastFetched
{
    public Forecast $forecast;

    public function __construct($forecast)
    {
        $this->forecast = $forecast;
    }

    public function getForeCast() : Forecast
    {
        return $this->forecast;
    }
}

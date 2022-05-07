<?php

namespace App\Jobs;

use App\Models\Forecast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TruncateCacheAndOldData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $oldData = Forecast::whereDate('created_at','<', today()->toDateString())->get(['id', 'date']);

        $oldData->each(function ($data) {
            $cacheName = sprintf(config('constants.cache_keys.call-times-date'),$data->date);
            Cache::forget($cacheName);
        });

        Forecast::destroy($oldData->pluck('id')->toArray());
    }
}

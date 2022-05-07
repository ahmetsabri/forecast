<?php

namespace App\Http\Controllers;

use App\Http\Requests\FetchForecastRequest;
use App\Repository\ForecastRepository;
use Illuminate\Http\JsonResponse;

class ForecastController extends Controller
{
    /**
     * get
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function get(FetchForecastRequest $request): JsonResponse
    {
        $data =  (new ForecastRepository($request->validated()['date']))->pull();

        return response()->json(compact('data'));
    }
}

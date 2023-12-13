<?php

namespace MuhammadHuzaifa\LaravelPulseGuzzleRecorder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MuhammadHuzaifa\LaravelPulseGuzzleRecorder\LaravelPulseGuzzleRecorder
 */
class LaravelPulseGuzzleRecorder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MuhammadHuzaifa\LaravelPulseGuzzleRecorder\LaravelPulseGuzzleRecorder::class;
    }
}

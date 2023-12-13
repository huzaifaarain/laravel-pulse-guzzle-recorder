<?php

namespace MuhammadHuzaifa\LaravelPulseGuzzleRecorder\Recorders;

use Carbon\CarbonImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Utils;
use Illuminate\Contracts\Foundation\Application;
use Laravel\Pulse\Recorders\SlowOutgoingRequests;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LaravelPulseGuzzleRecorder
{
    /**
     * Register the recorder.
     */
    public function register(Application $app): void
    {
        $app->bind(Client::class, function () {
            $stack = new HandlerStack();
            $stack->setHandler(Utils::chooseHandler());
            $stack->push($this->middleware());

            return new Client(['handler' => $stack]);
        });
    }

    public function middleware(): callable
    {
        return function (callable $handler) {
            return function (
                RequestInterface $request,
                array $options
            ) use ($handler) {
                $startedAt = CarbonImmutable::now();
                $promise = $handler($request, $options);

                return $promise->then(
                    function (ResponseInterface $response) use ($request, $startedAt) {
                        app(SlowOutgoingRequests::class)->record($request, $startedAt->getTimestampMs());

                        return $response;
                    }
                );
            };
        };
    }
}

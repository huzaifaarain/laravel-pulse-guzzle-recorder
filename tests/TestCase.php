<?php

namespace MuhammadHuzaifa\LaravelPulseGuzzleRecorder\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use MuhammadHuzaifa\LaravelPulseGuzzleRecorder\LaravelPulseGuzzleRecorderServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'MuhammadHuzaifa\\LaravelPulseGuzzleRecorder\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelPulseGuzzleRecorderServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-pulse-guzzle-recorder_table.php.stub';
        $migration->up();
        */
    }
}

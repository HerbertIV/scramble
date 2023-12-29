<?php

namespace App\Providers;

use App\Events\EventBus;
use App\Services\ServiceTestBusFirst;
use App\Services\ServiceTestBusSecond;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        EventBus::class => EventBus::class,
        ServiceTestBusFirst::class => ServiceTestBusFirst::class,
        ServiceTestBusSecond::class => ServiceTestBusSecond::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

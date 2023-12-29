<?php

namespace App\Services;

use App\Events\EventBus;

class ServiceTestBusFirst
{
    public function __construct(
        private EventBus $eventBus
    ) {
    }

    public function register()
    {
        $this->eventBus->register();
    }
}

<?php

namespace App\Events;

class EventBus
{
    /* @var SubscriberReflection[] $subscribers */
    private array $subscribers = [];

    public function register(object $subscriber)
    {
        $this->subscribers[$subscriber::class] = (new SubscriberReflection($subscriber));

        return $this;
    }

    public function dispatch(object $event): void
    {
        foreach ($this->subscribers as $reflection) {
            $handlerMethod = $reflection->handleFor($event);
            if (!$handlerMethod) continue;

            $reflection->getSubscriber()->{$handlerMethod}($event);
        }
    }
}

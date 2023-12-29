<?php

namespace App\Events;

use ReflectionClass;
use const ReflectionNamedType;

class SubscriberReflection
{
    private ReflectionClass $reflection;
    public function __construct(
        private object $subscriber
    ) {
        $this->reflection = new ReflectionClass($subscriber);
        $this->subscriber = $this->subscriber;
    }

    public function handleFor(object $event): ?string
    {
        $handlerMethod = collect($this->reflection->getMethods(\ReflectionMethod::IS_PUBLIC))
            ->first(function (\ReflectionMethod $method) use ($event) {
                $firstParameter = $method->getParameters()[0] ?? null;

                if (!$firstParameter) return false;

                $type = $firstParameter->getType();
                if (!$type instanceof ReflectionNamedType) return false;

                return $type->getName() === $event::class;
            });

        return $handlerMethod?->getName();
    }

    public function getSubscriber(): object
    {
        return $this->subscriber;
    }
}

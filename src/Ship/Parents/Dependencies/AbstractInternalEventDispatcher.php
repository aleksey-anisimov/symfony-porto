<?php

declare(strict_types=1);

namespace App\Ship\Parents\Dependencies;

use Symfony\Component\Messenger\MessageBusInterface;

abstract class AbstractInternalEventDispatcher
{
    public function __construct(protected MessageBusInterface $bus)
    {
    }
}
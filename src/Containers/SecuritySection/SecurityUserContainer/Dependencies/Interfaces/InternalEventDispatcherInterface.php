<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces;

interface InternalEventDispatcherInterface
{
    public function sendSecurityUserCreatedEvent(string $id): void;
}
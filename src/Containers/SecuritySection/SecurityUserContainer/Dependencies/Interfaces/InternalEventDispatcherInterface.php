<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces;

use Symfony\Component\Uid\Uuid;

interface InternalEventDispatcherInterface
{
    public function sendSecurityUserCreatedEvent(Uuid $id): void;
}
<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies;

use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Messages\SecurityUserCreatedMessage;
use App\Ship\Parents\Dependencies\AbstractInternalEventDispatcher;

class InternalEventDispatcher extends AbstractInternalEventDispatcher implements InternalEventDispatcherInterface
{
    public function sendSecurityUserCreatedEvent(string $id): void
    {
        $this->bus->dispatch(new SecurityUserCreatedMessage($id));
    }
}
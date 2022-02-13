<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Ship\Parents\Dependencies\AbstractInternalEventDispatcher;

class InternalEventDispatcher extends AbstractInternalEventDispatcher implements InternalEventDispatcherInterface
{
    public function sendUserRegisteredEvent(string $id): void
    {
//        $this->bus->dispatch(new UserRegisteredMessage($id));
    }
}
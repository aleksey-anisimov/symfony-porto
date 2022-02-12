<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Messages\UserRegisteredMessage;
use App\Ship\Parents\Dependencies\AbstractInternalEventDispatcher;
use Symfony\Component\Uid\Uuid;

class InternalEventDispatcher extends AbstractInternalEventDispatcher implements InternalEventDispatcherInterface
{
    public function sendUserRegisteredEvent(Uuid $id): void
    {
//        $this->bus->dispatch(new UserRegisteredMessage($id));
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Ship\Parents\Dependencies\AbstractInternalEventDispatcher;
use Symfony\Component\Uid\Uuid;

class InternalEventDispatcher extends AbstractInternalEventDispatcher implements InternalEventDispatcherInterface
{
    public function __construct()
    {
    }

    public function sendUserRegisteredEvent(Uuid $id): bool
    {

    }
}
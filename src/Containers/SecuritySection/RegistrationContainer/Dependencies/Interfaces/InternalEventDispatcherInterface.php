<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces;

use Symfony\Component\Uid\Uuid;

interface InternalEventDispatcherInterface
{
    public function sendUserRegisteredEvent(Uuid $id): bool;
}
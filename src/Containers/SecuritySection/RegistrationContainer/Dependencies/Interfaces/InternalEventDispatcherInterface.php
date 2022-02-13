<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces;

interface InternalEventDispatcherInterface
{
    public function sendUserRegisteredEvent(string $id): void;
}
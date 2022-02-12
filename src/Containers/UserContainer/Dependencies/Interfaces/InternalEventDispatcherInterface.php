<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Interfaces;

use App\Containers\UserContainer\Models\User;

interface InternalEventDispatcherInterface
{
    public function sendSecurityUserCreatedEvent(User $user): void;
}
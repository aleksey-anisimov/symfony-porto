<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Events;

use App\Containers\UserContainer\Dependencies\Models\UserPublic;

class UserRegisteredEvent
{
    private UserPublic $user;

    public function __construct(UserPublic $user)
    {
        $this->user = $user;
    }

    public function getUser(): UserPublic
    {
        return $this->user;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Events;

use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use App\Ship\Parents\Events\AbstractEvent;

class UserProfileUpdatedEvent extends AbstractEvent
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
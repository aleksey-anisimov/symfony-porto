<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Messages;

use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use App\Ship\Parents\Messages\AbstractMessage;

class UserProfileUpdatedMessage extends AbstractMessage
{
    public function __construct(private UserPublic $user)
    {
    }

    public function getUser(): UserPublic
    {
        return $this->user;
    }
}
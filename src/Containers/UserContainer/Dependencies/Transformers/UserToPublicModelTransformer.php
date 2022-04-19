<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Transformers;

use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use App\Containers\UserContainer\Models\User;

class UserToPublicModelTransformer
{
    public function toPublicModel(User $user): UserPublic
    {
        $userPublic = new UserPublic();
        $userPublic->id = $user->getId();
        $userPublic->email = $user->getEmail();
        $userPublic->firstname = $user->getFirstname();

        return $userPublic;
    }
}
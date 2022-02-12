<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Transformers;

use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;

class UserToPublicModelTransformer
{
    public function toPublicModel(UserInterface $user): UserPublic
    {
        $userPublic = new UserPublic();
        $userPublic->id = $user->getId();
        $userPublic->email = $user->getEmail();
        $userPublic->firstname = $user->getFirstname();

        return $userPublic;
    }
}
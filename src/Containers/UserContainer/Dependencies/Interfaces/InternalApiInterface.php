<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Interfaces;

use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use App\Containers\UserContainer\Dependencies\Values\CreateUserValue;

interface InternalApiInterface
{
    public function getUserById(string $id): ?UserPublic;

    public function createUser(CreateUserValue $createUserValue): bool;
}
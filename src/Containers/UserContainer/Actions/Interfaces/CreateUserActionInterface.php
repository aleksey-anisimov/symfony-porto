<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Actions\Interfaces;

use App\Containers\UserContainer\Models\User;
use App\Containers\UserContainer\Values\UserValue;

interface CreateUserActionInterface
{
    public function run(UserValue $userValue): ?User;
}
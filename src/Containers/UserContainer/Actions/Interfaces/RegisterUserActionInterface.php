<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Actions\Interfaces;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Values\UserValue;

interface RegisterUserActionInterface
{
    public function run(UserValue $userValue): ?UserInterface;
}
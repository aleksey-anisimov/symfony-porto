<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\LoginContainer\Models\User;

interface ValidatePasswordTaskInterface
{
    public function run(User $securityUser, string $password): bool;
}
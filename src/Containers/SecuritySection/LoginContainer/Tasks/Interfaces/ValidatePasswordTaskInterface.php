<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\LoginContainer\Models\SecurityUser;

interface ValidatePasswordTaskInterface
{
    public function run(SecurityUser $securityUser, string $password): bool;
}
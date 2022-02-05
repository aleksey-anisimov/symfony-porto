<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\UserInterface;

interface GetSecurityUserByEmailTaskInterface
{
    public function run(string $email): ?UserInterface;
}
<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\SecurityUserInterface;

interface GetSecurityUserByEmailTaskInterface
{
    public function run(string $email): ?SecurityUserInterface;
}
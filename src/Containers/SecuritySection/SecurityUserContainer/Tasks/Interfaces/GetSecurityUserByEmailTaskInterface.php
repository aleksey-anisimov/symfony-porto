<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;

interface GetSecurityUserByEmailTaskInterface
{
    public function run(string $email): ?SecurityUser;
}
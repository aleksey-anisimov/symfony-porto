<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;

interface GetSecurityUserByIdTaskInterface
{
    public function run(string $id): ?SecurityUser;
}
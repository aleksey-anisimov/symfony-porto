<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;

interface HashPasswordTaskInterface
{
    public function run(SecurityUser $securityUser, string $password): string;
}
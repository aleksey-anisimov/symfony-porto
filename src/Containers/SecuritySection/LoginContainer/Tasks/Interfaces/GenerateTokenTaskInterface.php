<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\LoginContainer\Models\User;

interface GenerateTokenTaskInterface
{
    public function run(User $securityUser): string;
}
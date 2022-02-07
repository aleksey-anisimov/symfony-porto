<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\UserInterface;
use App\Containers\SecuritySection\LoginContainer\Models\User;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\ValidatePasswordTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class ValidatePasswordTask extends AbstractTask implements ValidatePasswordTaskInterface
{
    public function run(User $securityUser, string $password): bool
    {
        // TODO: Implement run() method.
    }
}
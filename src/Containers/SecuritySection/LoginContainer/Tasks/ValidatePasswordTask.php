<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Models\SecurityUser;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\ValidatePasswordTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class ValidatePasswordTask extends AbstractTask implements ValidatePasswordTaskInterface
{
    public function run(SecurityUser $securityUser, string $password): bool
    {
        return true; // TODO: add validation
    }
}
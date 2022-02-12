<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\SecurityUserInterface;
use App\Containers\SecuritySection\LoginContainer\Models\SecurityUser;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetSecurityUserByEmailTask extends AbstractTask implements GetSecurityUserByEmailTaskInterface
{
    public function run(string $email): ?SecurityUserInterface
    {
        $securityUser = new SecurityUser();// TODO: get from repository
        $securityUser->setEmail($email);

        return $securityUser;
    }
}
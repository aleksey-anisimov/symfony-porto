<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\UserInterface;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetSecurityUserByEmailTask extends AbstractTask implements GetSecurityUserByEmailTaskInterface
{
    public function run(string $email): ?UserInterface
    {
        // TODO: Implement run() method.
    }
}
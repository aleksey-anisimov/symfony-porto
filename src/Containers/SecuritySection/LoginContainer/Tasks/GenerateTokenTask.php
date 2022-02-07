<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Models\User;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GenerateTokenTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GenerateTokenTask extends AbstractTask implements GenerateTokenTaskInterface
{
    public function run(User $securityUser): string
    {
        // TODO: Implement run() method.
    }
}
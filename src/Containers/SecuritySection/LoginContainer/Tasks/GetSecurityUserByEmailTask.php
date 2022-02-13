<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\SecurityUserInterface;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetSecurityUserByEmailTask extends AbstractTask implements GetSecurityUserByEmailTaskInterface
{
    public function __construct(private InternalClientInterface $internalClient)
    {
    }

    public function run(string $email): ?SecurityUserInterface
    {
        return $this->internalClient->getSecurityUserByEmail($email);
    }
}
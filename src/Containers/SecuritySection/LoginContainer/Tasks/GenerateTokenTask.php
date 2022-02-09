<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Models\SecurityUser;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GenerateTokenTaskInterface;
use App\Ship\Core\Security\Interfaces\TokenManagerInterface;
use App\Ship\Core\Security\SecurityUser as GlobalSecurityUser;
use App\Ship\Parents\Tasks\AbstractTask;

class GenerateTokenTask extends AbstractTask implements GenerateTokenTaskInterface
{
    public function __construct(private TokenManagerInterface $tokenManager)
    {
    }

    public function run(SecurityUser $securityUser): string
    {
        $globalSecurityUser = new GlobalSecurityUser(
            $securityUser->getId(),
            $securityUser->getEmail(),
            $securityUser->getRoles()
        );

        return $this->tokenManager->createToken($globalSecurityUser);
    }
}
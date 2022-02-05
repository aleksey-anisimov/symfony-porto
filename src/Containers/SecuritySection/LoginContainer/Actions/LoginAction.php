<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Actions;

use App\Containers\SecuritySection\LoginContainer\Actions\Interfaces\LoginActionInterface;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GenerateTokenTaskInterface;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\ValidatePasswordTaskInterface;
use App\Containers\SecuritySection\LoginContainer\Values\CredentialsValue;
use App\Containers\SecuritySection\LoginContainer\Values\TokenValue;
use App\Ship\Parents\Actions\AbstractAction;

class LoginAction extends AbstractAction implements LoginActionInterface
{
    public function __construct(
        private GetSecurityUserByEmailTaskInterface $getSecurityUserByEmailTask,
        private ValidatePasswordTaskInterface $validatePasswordTask,
        private GenerateTokenTaskInterface $generateTokenTask,
    ) {
    }

    public function run(CredentialsValue $credentials): ?TokenValue
    {
        $securityUser = $this->getSecurityUserByEmailTask->run($credentials->getEmail());

        if (!$securityUser) {
            return null;
        }

        if (!$this->validatePasswordTask->run($securityUser, $credentials->getPassword())) {
            return null;
        }

        $token = $this->generateTokenTask->run($securityUser);

        return new TokenValue($token);
    }
}
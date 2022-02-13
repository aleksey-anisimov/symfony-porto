<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Dependencies;

use App\Containers\SecuritySection\LoginContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\SecuritySection\LoginContainer\Models\SecurityUser;
use App\Containers\SecuritySection\LoginContainer\Values\CredentialsValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces\InternalApiInterface as SecurityUserApi;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\CredentialsValue as SecurityUserCredentials;
use App\Ship\Parents\Dependencies\AbstractInternalClient;

class InternalClient extends AbstractInternalClient implements InternalClientInterface
{
    public function __construct(private SecurityUserApi $securityUserApi)
    {
    }

    public function validatePassword(CredentialsValue $credentialsValue): bool
    {
        $credentials = new SecurityUserCredentials();
        $credentials->email = $credentialsValue->getEmail();
        $credentials->password = $credentialsValue->getPassword();

        return $this->securityUserApi->validateCredentials($credentials);
    }

    public function getSecurityUserByEmail(string $email): ?SecurityUser
    {
        $securityUser = $this->securityUserApi->getSecurityUserByEmail($email);

        return $securityUser ? new SecurityUser($securityUser->id, $securityUser->email, $securityUser->roles) : null;
    }
}
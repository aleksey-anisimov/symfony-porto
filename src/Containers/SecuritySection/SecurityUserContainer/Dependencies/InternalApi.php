<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies;

use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\CreateSecurityUserActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\ValidatePasswordActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\CredentialsValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\IdentityValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\SecurityUserValue;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\CheckSecurityUserExistenceTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Values\CredentialsValue as Credentials;
use App\Containers\SecuritySection\SecurityUserContainer\Values\IdentityValue as Identity;
use App\Containers\SecuritySection\SecurityUserContainer\Values\SecurityUserValue as SecurityUser;
use App\Ship\Parents\Dependencies\AbstractInternalApi;

class InternalApi extends AbstractInternalApi implements InternalApiInterface
{
    public function __construct(
        private ValidatePasswordActionInterface $validatePasswordAction,
        private CheckSecurityUserExistenceTaskInterface $checkSecurityUserExistence,
        private CreateSecurityUserActionInterface $createSecurityUserAction
    ) {
    }

    public function validateCredentials(CredentialsValue $credentialsValue): bool
    {
        $credentials = new Credentials($credentialsValue->email, $credentialsValue->password);

        return $this->validatePasswordAction->run($credentials);
    }

    public function checkUserExistence(IdentityValue $identityValue): bool
    {
        $identity = new Identity($identityValue->id, $identityValue->email);

        return $this->checkSecurityUserExistence->run($identity);
    }

    public function createSecurityUser(SecurityUserValue $securityUserValue): bool
    {
        $securityUser = new SecurityUser(
            $securityUserValue->id,
            $securityUserValue->email,
            $securityUserValue->password
        );

        return $this->createSecurityUserAction->run($securityUser);
    }
}
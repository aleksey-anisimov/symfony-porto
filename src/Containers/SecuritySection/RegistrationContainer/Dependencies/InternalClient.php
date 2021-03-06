<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces\InternalApiInterface as SecurityUserContainerApi;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\IdentityValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\SecurityUserValue;
use App\Containers\UserContainer\Dependencies\Interfaces\InternalApiInterface as UserContainerApi;
use App\Containers\UserContainer\Dependencies\Values\CreateUserValue;
use App\Ship\Parents\Dependencies\AbstractInternalClient;

class InternalClient extends AbstractInternalClient implements InternalClientInterface
{
    public function __construct(
        private SecurityUserContainerApi $securityUserContainerApi,
        private UserContainerApi $userContainerApi,
    ) {
    }

    public function checkCredentialsExistence(UserValue $userValue): bool
    {
        $identityValue = new IdentityValue();
        $identityValue->id = $userValue->getId();
        $identityValue->email = $userValue->getEmail();

        return $this->securityUserContainerApi->checkUserExistence($identityValue);
    }

    public function createCredentials(UserValue $userValue): bool
    {
        $securityUserValue = new SecurityUserValue();
        $securityUserValue->id = $userValue->getId();
        $securityUserValue->email = $userValue->getEmail();
        $securityUserValue->password = $userValue->getPassword();
        $securityUserValue->roles = $userValue->getRoles();

        return $this->securityUserContainerApi->createSecurityUser($securityUserValue);
    }

    public function createUserProfile(UserValue $userValue): bool
    {
        $createUserValue = new CreateUserValue();
        $createUserValue->id = $userValue->getId();
        $createUserValue->email = $userValue->getEmail();
        $createUserValue->firstname = $userValue->getFirstname();

        return $this->userContainerApi->createUser($createUserValue);
    }
}
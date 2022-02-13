<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies;

use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\CreateSecurityUserActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\ValidatePasswordActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Model\SecurityUserPublic;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Transformers\SecurityUserToPublicModelTransformer;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\CredentialsValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\IdentityValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\SecurityUserValue;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\CheckSecurityUserExistenceTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\GetSecurityUserByIdTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Values\CredentialsValue as Credentials;
use App\Containers\SecuritySection\SecurityUserContainer\Values\IdentityValue as Identity;
use App\Containers\SecuritySection\SecurityUserContainer\Values\SecurityUserValue as SecurityUser;
use App\Ship\Parents\Dependencies\AbstractInternalApi;

class InternalApi extends AbstractInternalApi implements InternalApiInterface
{
    public function __construct(
        private ValidatePasswordActionInterface $validatePasswordAction,
        private CheckSecurityUserExistenceTaskInterface $checkSecurityUserExistence,
        private CreateSecurityUserActionInterface $createSecurityUserAction,
        private GetSecurityUserByIdTaskInterface $getSecurityUserByIdTask,
        private GetSecurityUserByEmailTaskInterface $getSecurityUserByEmailTask,
        private SecurityUserToPublicModelTransformer $transformer,
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

    public function getSecurityUserById(string $id): ?SecurityUserPublic
    {
        $securityUser = $this->getSecurityUserByIdTask->run($id);

        return $securityUser ? $this->transformer->toPublicModel($securityUser) : null;
    }

    public function getSecurityUserByEmail(string $email): ?SecurityUserPublic
    {
        $securityUser = $this->getSecurityUserByEmailTask->run($email);

        return $securityUser ? $this->transformer->toPublicModel($securityUser) : null;
    }
}
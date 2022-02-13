<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Model\SecurityUserPublic;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\CredentialsValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\IdentityValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Values\SecurityUserValue;
use Symfony\Component\Uid\Uuid;

interface InternalApiInterface
{
    public function validateCredentials(CredentialsValue $credentialsValue): bool;

    public function checkUserExistence(IdentityValue $identityValue): bool;

    public function createSecurityUser(SecurityUserValue $securityUserValue): bool;

    public function getSecurityUserById(Uuid $id): ?SecurityUserPublic;

    public function getSecurityUserByEmail(string $email): ?SecurityUserPublic;
}
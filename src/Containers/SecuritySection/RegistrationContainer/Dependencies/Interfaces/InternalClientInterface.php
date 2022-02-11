<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces;

use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;

interface InternalClientInterface
{
    public function checkCredentialsExistence(UserValue $userValue): bool;

    public function createCredentials(UserValue $userValue): bool;

    public function createUserProfile(UserValue $userValue): bool;
}
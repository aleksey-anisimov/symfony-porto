<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Dependencies\Interfaces;

use App\Containers\SecuritySection\LoginContainer\Models\SecurityUser;
use App\Containers\SecuritySection\LoginContainer\Values\CredentialsValue;

interface InternalClientInterface
{
    public function validatePassword(CredentialsValue $credentialsValue): bool;

    public function getSecurityUserByEmail(string $email): ?SecurityUser;
}
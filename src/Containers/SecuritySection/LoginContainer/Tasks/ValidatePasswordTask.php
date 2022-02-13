<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Tasks;

use App\Containers\SecuritySection\LoginContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\SecuritySection\LoginContainer\Models\SecurityUser;
use App\Containers\SecuritySection\LoginContainer\Tasks\Interfaces\ValidatePasswordTaskInterface;
use App\Containers\SecuritySection\LoginContainer\Values\CredentialsValue;
use App\Ship\Parents\Tasks\AbstractTask;

class ValidatePasswordTask extends AbstractTask implements ValidatePasswordTaskInterface
{
    public function __construct(private InternalClientInterface $internalClient)
    {
    }

    public function run(SecurityUser $securityUser, string $password): bool
    {
        $credentials = new CredentialsValue($securityUser->getEmail(), $password);

        return $this->internalClient->validatePassword($credentials);
    }
}
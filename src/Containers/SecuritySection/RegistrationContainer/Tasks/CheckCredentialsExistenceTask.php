<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Tasks;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\CheckCredentialsExistenceTaskInterface;
use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;
use App\Ship\Parents\Tasks\AbstractTask;

class CheckCredentialsExistenceTask extends AbstractTask implements CheckCredentialsExistenceTaskInterface
{
    public function __construct(private InternalClientInterface $internalClient)
    {
    }

    public function run(UserValue $userValue): bool
    {
        return $this->internalClient->checkCredentialsExistence($userValue);
    }
}
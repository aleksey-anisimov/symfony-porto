<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Tasks;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\SaveUserProfileTaskInterface;
use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveUserProfileTask extends AbstractTask implements SaveUserProfileTaskInterface
{
    public function __construct(private InternalClientInterface $internalClient)
    {
    }

    public function run(UserValue $userValue): bool
    {
        return $this->internalClient->createUserProfile($userValue);
    }
}
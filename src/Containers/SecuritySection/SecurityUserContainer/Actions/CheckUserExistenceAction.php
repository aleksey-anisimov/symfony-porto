<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Actions;

use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\ValidatePasswordActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\GetSecurityUserByEmailTask;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\GetSecurityUserByIdTask;
use App\Containers\SecuritySection\SecurityUserContainer\Values\CredentialsValue;
use App\Ship\Parents\Actions\AbstractAction;

class CheckUserExistenceAction extends AbstractAction implements ValidatePasswordActionInterface
{
    public function __construct(
        private GetSecurityUserByIdTask $getSecurityUserByIdTask,
        private GetSecurityUserByEmailTask $getSecurityUserByEmailTask,
    ) {
    }

    public function run(CredentialsValue $credentials): bool
    {
        return $this->getSecurityUserByIdTask || $this->getSecurityUserByEmailTask;
    }
}
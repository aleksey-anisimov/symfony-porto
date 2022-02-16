<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Actions;

use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\CreateSecurityUserActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\CheckSecurityUserExistenceTask;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\HashPasswordTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\SaveSecurityUserTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Values\IdentityValue;
use App\Containers\SecuritySection\SecurityUserContainer\Values\SecurityUserValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateSecurityUserAction extends AbstractAction implements CreateSecurityUserActionInterface
{
    public function __construct(
        private CheckSecurityUserExistenceTask $checkSecurityUserExistenceTask,
        private SaveSecurityUserTaskInterface $saveSecurityUserTask,
        private HashPasswordTaskInterface $hashPasswordTask,
    ) {
    }

    public function run(SecurityUserValue $securityUserValue): bool
    {
        $identity = new IdentityValue($securityUserValue->getId(), $securityUserValue->getEmail());

        if ($this->checkSecurityUserExistenceTask->run($identity)) {
            return false;
        }

        $securityUser = new SecurityUser($securityUserValue->getId());
        $securityUser->setEmail($securityUserValue->getEmail());
        $securityUser->setPassword($this->hashPasswordTask->run($securityUser, $securityUserValue->getPassword()));

        $this->saveSecurityUserTask->run($securityUser);

        return true;
    }
}
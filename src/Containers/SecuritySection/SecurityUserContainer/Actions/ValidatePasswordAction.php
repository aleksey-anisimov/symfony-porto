<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Actions;

use App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces\ValidatePasswordActionInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\VerifyPasswordTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Values\CredentialsValue;
use App\Ship\Parents\Actions\AbstractAction;

class ValidatePasswordAction extends AbstractAction implements ValidatePasswordActionInterface
{
    public function __construct(
        private GetSecurityUserByEmailTaskInterface $getSecurityUserByEmailTask,
        private VerifyPasswordTaskInterface $verifyPasswordTask,
    ) {
    }

    public
    function run(
        CredentialsValue $credentials
    ): bool {
        $securityUser = $this->getSecurityUserByEmailTask->run($credentials->getEmail());

        if (!$securityUser) {
            return false;
        }

        return $this->verifyPasswordTask->run($securityUser, $credentials->getPassword());
    }
}
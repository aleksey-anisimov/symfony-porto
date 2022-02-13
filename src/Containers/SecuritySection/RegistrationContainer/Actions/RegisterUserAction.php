<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Actions;

use App\Containers\SecuritySection\RegistrationContainer\Actions\Interfaces\RegisterUserActionInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\CheckCredentialsExistenceTaskInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\SaveCredentialsTaskInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\SaveUserProfileTaskInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\SendUserRegisteredEventTaskInterface;
use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;
use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Tasks\AbstractTask;

class RegisterUserAction extends AbstractTask implements RegisterUserActionInterface
{
    public function __construct(
        private CheckCredentialsExistenceTaskInterface $checkUserExistenceTask,
        private SaveCredentialsTaskInterface $saveCredentialsTask,
        private SaveUserProfileTaskInterface $saveUserProfileTask,
        private SendUserRegisteredEventTaskInterface $sendUserRegisteredEventTask
    ) {
    }

    public function run(UserValue $userValue): bool
    {
        $userValue->id = UuidGenerator::uuidString($userValue->id);
        $userValue->roles = ['ROLE_USER'];

        if ($this->checkUserExistenceTask->run($userValue)) {
            return false; // TODO: exception that user is already registered
        }

        if (!$this->saveCredentialsTask->run($userValue)) {
            return false; // TODO: error of saving credentials
        }

        if (!$this->saveUserProfileTask->run($userValue)) {
            return false; // TODO: error of saving profile
        }

        $this->sendUserRegisteredEventTask->run($userValue->id);

        return true;
    }
}
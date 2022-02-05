<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Actions;

use App\Containers\UserContainer\Actions\Interfaces\RegisterUserActionInterface;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Models\User;
use App\Containers\UserContainer\Tasks\Interfaces\CheckIsUserExistsTaskInterface;
use App\Containers\UserContainer\Tasks\Interfaces\HashPasswordTaskInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SaveUserTaskInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SendUserRegisteredEventTaskInterface;
use App\Containers\UserContainer\Values\UserValue;
use App\Ship\Parents\Tasks\AbstractTask;

class RegisterUserAction extends AbstractTask implements RegisterUserActionInterface
{
    public function __construct(
        private CheckIsUserExistsTaskInterface $checkIsUserExistsTask,
        private HashPasswordTaskInterface $hashPasswordTask,
        private SaveUserTaskInterface $saveUserTask,
        private SendUserRegisteredEventTaskInterface $sendUserRegisteredEventTask,
    ) {
    }

    public function run(UserValue $userValue): UserInterface
    {
        if (!$this->checkIsUserExistsTask->run($userValue->email)) {
            // TODO: throw UserWithSameEmailAlreadyRegisteredException
        }

        $user = new User();
        $user->setEmail($userValue->email);
        $user->setPassword($this->hashPasswordTask->run($userValue->password));
        $user->setRoles(['ROLE_USER']);

        $this->saveUserTask->run($user);
        $this->sendUserRegisteredEventTask->run($user);

        return $user;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Actions;

use App\Containers\UserContainer\Actions\Interfaces\CreateUserActionInterface;
use App\Containers\UserContainer\Models\User;
use App\Containers\UserContainer\Tasks\Interfaces\CheckIsUserExistsTaskInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SaveUserTaskInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SendUserUpdatedEventTaskInterface;
use App\Containers\UserContainer\Values\UserValue;
use App\Ship\Parents\Tasks\AbstractTask;

class CreateUserAction extends AbstractTask implements CreateUserActionInterface
{
    public function __construct(
        private CheckIsUserExistsTaskInterface $checkIsUserExistsTask,
        private SaveUserTaskInterface $saveUserTask,
        private SendUserUpdatedEventTaskInterface $sendUserUpdatedEventTask,
    ) {
    }

    public function run(UserValue $userValue): User
    {
        if (!$this->checkIsUserExistsTask->run($userValue->email)) {
            // TODO: throw UserWithSameEmailAlreadyRegisteredException
        }

        $user = new User($userValue->id);
        $user->setEmail($userValue->email);
        $user->setFirstname($userValue->firstname);

        $this->saveUserTask->run($user);
        $this->sendUserUpdatedEventTask->run($user);

        return $user;
    }
}
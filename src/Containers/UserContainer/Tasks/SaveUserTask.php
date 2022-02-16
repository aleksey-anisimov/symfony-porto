<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SaveUserTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveUserTask extends AbstractTask implements SaveUserTaskInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function run(UserInterface $user): void
    {
        $this->repository->save($user);
    }
}
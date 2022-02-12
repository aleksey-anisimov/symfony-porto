<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\UserContainer\Tasks\Interfaces\CheckIsUserExistsTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class CheckIsUserExistsTask extends AbstractTask implements CheckIsUserExistsTaskInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function run(string $email): bool
    {
        return (bool)$this->repository->findByEmail($email);
    }
}
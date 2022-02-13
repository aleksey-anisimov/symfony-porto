<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks;

use App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces\SecurityUserRepositoryInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\GetSecurityUserByIdTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetSecurityUserByIdTask extends AbstractTask implements GetSecurityUserByIdTaskInterface
{
    public function __construct(private SecurityUserRepositoryInterface $repository)
    {
    }

    public function run(string $id): ?SecurityUser
    {
        return $this->repository->findById($id);
    }
}
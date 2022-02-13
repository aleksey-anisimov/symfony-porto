<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks;

use App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces\SecurityUserRepositoryInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\GetSecurityUserByEmailTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetSecurityUserByEmailTask extends AbstractTask implements GetSecurityUserByEmailTaskInterface
{
    public function __construct(private SecurityUserRepositoryInterface $repository)
    {
    }

    public function run(string $email): ?SecurityUser
    {
        return $this->repository->findByEmail($email);
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks;

use App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces\SecurityUserRepositoryInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\CheckSecurityUserExistenceTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Values\IdentityValue;
use App\Ship\Parents\Tasks\AbstractTask;

class CheckSecurityUserExistenceTask extends AbstractTask implements CheckSecurityUserExistenceTaskInterface
{
    public function __construct(
        private SecurityUserRepositoryInterface $repository
    ) {
    }

    public function run(IdentityValue $identity): bool
    {
        return $this->repository->findById($identity->getId()) || $this->repository->findByEmail($identity->getEmail());
    }
}
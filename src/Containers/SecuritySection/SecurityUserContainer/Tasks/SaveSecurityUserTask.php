<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks;

use App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces\SecurityUserRepositoryInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\SaveSecurityUserTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveSecurityUserTask extends AbstractTask implements SaveSecurityUserTaskInterface
{
    public function __construct(
        private SecurityUserRepositoryInterface $repository,
        private InternalEventDispatcherInterface $internalEventDispatcher
    ) {
    }

    public function run(SecurityUserInterface $securityUser): void
    {
        $this->repository->save($securityUser);

        $this->internalEventDispatcher->sendSecurityUserCreatedEvent($securityUser->getId());
    }
}
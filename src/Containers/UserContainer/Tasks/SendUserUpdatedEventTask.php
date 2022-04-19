<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\UserContainer\Models\User;
use App\Containers\UserContainer\Tasks\Interfaces\SendUserUpdatedEventTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SendUserUpdatedEventTask extends AbstractTask implements SendUserUpdatedEventTaskInterface
{
    public function __construct(private InternalEventDispatcherInterface $internalEventDispatcher)
    {
    }

    public function run(User $user): void
    {
        $this->internalEventDispatcher->sendSecurityUserCreatedEvent($user);
    }
}
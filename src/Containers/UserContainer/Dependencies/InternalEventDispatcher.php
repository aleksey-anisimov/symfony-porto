<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies;

use App\Containers\UserContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\UserContainer\Dependencies\Messages\UserProfileUpdatedMessage;
use App\Containers\UserContainer\Dependencies\Transformers\UserToPublicModelTransformer;
use App\Containers\UserContainer\Models\User;
use App\Ship\Parents\Dependencies\AbstractInternalEventDispatcher;
use Symfony\Component\Messenger\MessageBusInterface;

class InternalEventDispatcher extends AbstractInternalEventDispatcher implements InternalEventDispatcherInterface
{
    public function __construct(protected MessageBusInterface $bus, private UserToPublicModelTransformer $transformer)
    {
        parent::__construct($this->bus);
    }

    public function sendSecurityUserCreatedEvent(User $user): void
    {
        $userPublic = $this->transformer->toPublicModel($user);

        $this->bus->dispatch(new UserProfileUpdatedMessage($userPublic));
    }
}
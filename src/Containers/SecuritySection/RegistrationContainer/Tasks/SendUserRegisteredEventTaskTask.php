<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Tasks;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\SendUserRegisteredEventTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Symfony\Component\Uid\Uuid;

class SendUserRegisteredEventTaskTask extends AbstractTask implements SendUserRegisteredEventTaskInterface
{
    public function __construct(private InternalEventDispatcherInterface $internalEventDispatcher)
    {
    }

    public function run(Uuid $id): bool
    {
        return $this->internalEventDispatcher->sendUserRegisteredEvent($id);
    }
}
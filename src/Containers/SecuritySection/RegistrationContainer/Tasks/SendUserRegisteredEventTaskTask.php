<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Tasks;

use App\Containers\SecuritySection\RegistrationContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\SecuritySection\RegistrationContainer\Tasks\Interfaces\SendUserRegisteredEventTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SendUserRegisteredEventTaskTask extends AbstractTask implements SendUserRegisteredEventTaskInterface
{
    public function __construct(private InternalEventDispatcherInterface $internalEventDispatcher)
    {
    }

    public function run(string $id): void
    {
        $this->internalEventDispatcher->sendUserRegisteredEvent($id);
    }
}
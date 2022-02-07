<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SendUserRegisteredEventTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SendUserRegisteredEventTask extends AbstractTask implements SendUserRegisteredEventTaskInterface
{
    public function run(UserInterface $user): void
    {
        // TODO: Implement run() method.
    }
}
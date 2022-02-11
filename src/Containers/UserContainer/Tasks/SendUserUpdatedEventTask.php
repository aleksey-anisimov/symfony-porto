<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SendUserUpdatedEventTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SendUserUpdatedEventTask extends AbstractTask implements SendUserUpdatedEventTaskInterface
{
    public function run(UserInterface $user): void
    {
        // TODO: Implement run() method.
    }
}
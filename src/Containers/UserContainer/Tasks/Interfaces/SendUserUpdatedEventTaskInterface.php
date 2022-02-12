<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks\Interfaces;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;

interface SendUserUpdatedEventTaskInterface
{
    public function run(UserInterface $user): void;
}
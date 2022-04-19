<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks\Interfaces;

use App\Containers\UserContainer\Models\User;

interface SendUserUpdatedEventTaskInterface
{
    public function run(User $user): void;
}
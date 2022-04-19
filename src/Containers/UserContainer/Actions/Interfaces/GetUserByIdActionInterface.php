<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Actions\Interfaces;

use App\Containers\UserContainer\Models\User;

interface GetUserByIdActionInterface
{
    public function run(string $id): ?User;
}
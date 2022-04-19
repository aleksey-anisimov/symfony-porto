<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Data\Repositories\Interfaces;

use App\Containers\UserContainer\Models\User;

interface UserRepositoryInterface
{
    public function findById(string $id): ?User;

    public function findByEmail(string $email): ?User;

    public function save(User $user): void;
}
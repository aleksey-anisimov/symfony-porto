<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Data\Repositories\Interfaces;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;

interface UserRepositoryInterface
{
    public function findById(string $id): ?UserInterface;

    public function findByEmail(string $email): ?UserInterface;

    public function save(UserInterface $user): void;
}
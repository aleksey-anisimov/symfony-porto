<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Data\Repositories\Interfaces;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use Symfony\Component\Uid\Uuid;

interface UserRepositoryInterface
{
    public function findById(Uuid $id): ?UserInterface;

    public function findByEmail(string $email): ?UserInterface;
}
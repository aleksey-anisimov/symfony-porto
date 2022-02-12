<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;
use Symfony\Component\Uid\Uuid;

interface SecurityUserRepositoryInterface
{
    public function findById(Uuid $id): ?SecurityUserInterface;

    public function findByEmail(string $email): ?SecurityUserInterface;
}
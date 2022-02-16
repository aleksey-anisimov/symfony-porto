<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;

interface SecurityUserRepositoryInterface
{
    public function findById(string $id): ?SecurityUserInterface;

    public function findByEmail(string $email): ?SecurityUserInterface;

    public function save(SecurityUserInterface $securityUser): void;
}
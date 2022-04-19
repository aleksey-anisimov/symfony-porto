<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;

interface SecurityUserRepositoryInterface
{
    public function findById(string $id): ?SecurityUser;

    public function findByEmail(string $email): ?SecurityUser;

    public function save(SecurityUser $securityUser): void;
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\OwnerInterface;

interface OwnerRepositoryInterface
{
    public function findById(string $id): ?OwnerInterface;

    public function save(OwnerInterface $owner): void;
}
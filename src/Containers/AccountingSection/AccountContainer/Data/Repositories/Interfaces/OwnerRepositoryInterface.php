<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Owner;

interface OwnerRepositoryInterface
{
    public function findById(string $id): ?Owner;

    public function save(Owner $owner): void;
}
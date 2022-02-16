<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;

interface AccountRepositoryInterface
{
    public function findById(string $id): ?AccountInterface;

    public function save(AccountInterface $account): void;
}
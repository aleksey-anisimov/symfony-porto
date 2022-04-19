<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;

interface AccountRepositoryInterface
{
    public function findById(string $id): ?AbstractAccount;

    public function save(AbstractAccount $account): void;
}
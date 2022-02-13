<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Data\Repositories\Interfaces;

interface TransactionRepositoryInterface
{
    public function getTransactionsSum(string $accountId): int;
}
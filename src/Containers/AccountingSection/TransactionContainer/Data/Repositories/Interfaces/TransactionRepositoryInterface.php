<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Data\Repositories\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function getTransactionsSum(string $accountId): int;

    public function save(Transaction $transaction): void;
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;

interface InternalEventDispatcherInterface
{
    public function dispatchTransactionCreated(
        Transaction $transaction,
        int $sourceSum,
        int $destinationSum
    ): void;
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;

interface InternalEventDispatcherInterface
{
    public function dispatchTransactionCreated(TransactionInterface $transaction): void;
}
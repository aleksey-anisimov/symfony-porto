<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;

interface SendTransactionCreatedEventTaskInterface
{
    public function run(TransactionInterface $transaction): void;
}
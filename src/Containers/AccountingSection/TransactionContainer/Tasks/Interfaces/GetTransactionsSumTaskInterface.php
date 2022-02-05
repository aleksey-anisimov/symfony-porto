<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;

interface GetTransactionsSumTaskInterface
{
    public function run(AccountInterface $transaction): int;
}
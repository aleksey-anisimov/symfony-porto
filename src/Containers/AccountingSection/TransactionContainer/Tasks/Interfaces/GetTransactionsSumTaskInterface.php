<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Account;

interface GetTransactionsSumTaskInterface
{
    public function run(Account $account): int;
}
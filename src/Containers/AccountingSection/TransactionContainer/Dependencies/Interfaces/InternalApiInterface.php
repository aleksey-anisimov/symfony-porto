<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces;

interface InternalApiInterface
{
    public function getTransactionsSum(string $accountId): int;
}
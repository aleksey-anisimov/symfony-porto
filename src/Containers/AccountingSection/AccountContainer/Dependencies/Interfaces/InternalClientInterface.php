<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces;

interface InternalClientInterface
{
    public function getTransactionsSum(string $accountId): int;
}
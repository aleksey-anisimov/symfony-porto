<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces;

use Symfony\Component\Uid\Uuid;

interface InternalApiInterface
{
    public function getTransactionsSum(Uuid $accountId): int;
}
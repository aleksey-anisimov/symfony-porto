<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Data\Repositories\Interfaces;

use Symfony\Component\Uid\Uuid;

interface TransactionRepositoryInterface
{
    public function getTransactionsSum(Uuid $accountId): int;
}
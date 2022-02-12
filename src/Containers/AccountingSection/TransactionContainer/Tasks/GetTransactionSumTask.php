<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\GetTransactionsSumTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetTransactionSumTask extends AbstractTask implements GetTransactionsSumTaskInterface
{
    public function run(AccountInterface $transaction): int
    {
        // TODO: Implement run() method.
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\GetTransactionsSumTaskInterface;
use App\Ship\Parents\Dependencies\AbstractInternalApi;

class InternalApi extends AbstractInternalApi implements InternalApiInterface
{
    public function __construct(
        private GetAccountTaskInterface $getAccountTask,
        private GetTransactionsSumTaskInterface $getTransactionsSumTask
    ) {
    }

    public function getTransactionsSum(string $accountId): int
    {
        $account = $this->getAccountTask->run($accountId);

        return $account ? $this->getTransactionsSumTask->run($account) : 0;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\GetTransactionsSumTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\SendTransactionCreatedEventTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SendTransactionCreatedEventTask extends AbstractTask implements SendTransactionCreatedEventTaskInterface
{
    public function __construct(
        private InternalEventDispatcherInterface $internalEventDispatcher,
        private GetTransactionsSumTaskInterface $getTransactionsSumTask
    ) {
    }

    public function run(Transaction $transaction): void
    {
        $sourceSum = $this->getTransactionsSumTask->run($transaction->getSource());
        $destinationSum = $this->getTransactionsSumTask->run($transaction->getDestination());

        $this->internalEventDispatcher->dispatchTransactionCreated($transaction, $sourceSum, $destinationSum);
    }
}
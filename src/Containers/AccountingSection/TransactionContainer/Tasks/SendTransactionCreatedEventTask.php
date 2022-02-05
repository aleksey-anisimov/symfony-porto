<?php

namespace App\Containers\AccountingSection\TransactionContainer\Tasks;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\AccountingSection\TransactionContainer\Dependencies\Models\TransactionPublic;
use App\Containers\AccountingSection\TransactionContainer\Events\TransactionCreatedEvent;
use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\SendTransactionCreatedEventTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SendTransactionCreatedEventTask extends AbstractTask implements SendTransactionCreatedEventTaskInterface
{
    public function __construct(private InternalEventDispatcherInterface $internalEventDispatcher)
    {
    }

    public function run(TransactionInterface $transaction): void
    {
        $transactionCreated = new TransactionCreatedEvent($this->createTransactionPublic($transaction));
        $this->internalEventDispatcher->dispatchTransactionCreated($transactionCreated);
    }

    private function createTransactionPublic(TransactionInterface $transaction): TransactionPublic
    {
        $transactionPublic = new TransactionPublic();
        $transactionPublic->id = $transaction->getId();
        $transactionPublic->sourceId = $transaction->getSource()->getId();
        $transactionPublic->destinationId = $transaction->getDestination()->getId();
        $transactionPublic->value = $transaction->getValue();

        return $transactionPublic;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
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
        $this->internalEventDispatcher->dispatchTransactionCreated($transaction);
    }
}
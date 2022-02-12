<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\AccountingSection\TransactionContainer\Dependencies\Transformers\TransactionToPublicModelTransformer;
use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Ship\Parents\Dependencies\AbstractInternalEventDispatcher;
use Symfony\Component\Messenger\MessageBusInterface;

class InternalEventDispatcher extends AbstractInternalEventDispatcher implements InternalEventDispatcherInterface
{
    public function __construct(
        protected MessageBusInterface $bus,
        private TransactionToPublicModelTransformer $transformer
    ) {
        parent::__construct($this->bus);
    }

    public function dispatchTransactionCreated(TransactionInterface $transaction): void
    {
        $transactionPublic = $this->transformer->toPublicModel($transaction);

        $this->bus->dispatch($transactionPublic);
    }
}
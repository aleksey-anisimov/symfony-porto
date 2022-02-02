<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies;

use App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces\InternalEventSubscriberInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Events\TransactionCreatedEvent;
use App\Ship\Parents\Dependencies\AbstractInternalEventSubscriber;

class InternalEventSubscriber extends AbstractInternalEventSubscriber implements InternalEventSubscriberInterface
{
    public function __construct(
        private InternalClientInterface $internalClient,
        private GetAccountTaskInterface $getAccountTask,
        private SaveAccountTaskInterface $saveAccountTask
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            TransactionCreatedEvent::class => 'onTransactionCreated',
        ];
    }

    // TODO: refactor it
    public function onTransactionCreated(TransactionCreatedEvent $event): void
    {
        $transaction = $event->getTransaction();
        $source = $this->getAccountTask->run($transaction->sourceId);
        $sum = $this->internalClient->getTransactionsSum($transaction->sourceId);
        $source->setBalance($sum);
        $this->saveAccountTask->run($source);

        $destination = $this->getAccountTask->run($transaction->destinationId);
        $sum = $this->internalClient->getTransactionsSum($transaction->destinationId);
        $destination->setBalance($sum);
        $this->saveAccountTask->run($destination);
    }
}
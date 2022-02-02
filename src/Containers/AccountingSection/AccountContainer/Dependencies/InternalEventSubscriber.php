<?php

namespace App\Containers\AccountingSection\AccountContainer\Dependencies;

use App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces\InternalEventSubscriberInterface;
use App\Containers\AccountingSection\TransactionContainer\Events\TransactionCreatedEvent;
use App\Ship\Parents\Dependencies\AbstractInternalEventSubscriber;

class InternalEventSubscriber extends AbstractInternalEventSubscriber implements InternalEventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            TransactionCreatedEvent::class => 'onTransactionCreated',
        ];
    }

    public function onTransactionCreated(TransactionCreatedEvent $event): void
    {
        $transaction = $event->getTransaction();
        // TODO: recalculate balance of source and destination accounts
    }
}
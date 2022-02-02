<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces\InternalEventDispatcherInterface;
use App\Containers\AccountingSection\TransactionContainer\Events\TransactionCreatedEvent;
use App\Ship\Parents\Dependencies\AbstractInternalEventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class InternalEventDispatcher extends AbstractInternalEventDispatcher implements InternalEventDispatcherInterface
{
    public function __construct(private EventDispatcherInterface $eventDispatcher)
    {
    }

    public function dispatchTransactionCreated(TransactionCreatedEvent $event): void
    {
        $this->eventDispatcher->dispatch($event, TransactionCreatedEvent::NAME);
    }
}
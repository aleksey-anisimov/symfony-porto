<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Events\TransactionCreatedEvent;

interface InternalEventSubscriberInterface
{
    public function onTransactionCreated(TransactionCreatedEvent $event): void;
}
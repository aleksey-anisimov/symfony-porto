<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Events;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Models\TransactionPublic;
use App\Ship\Parents\Events\AbstractEvent;

class TransactionCreatedEvent extends AbstractEvent
{
    public const NAME = 'accounting_section.transaction_container.transaction_created';

    private TransactionPublic $transaction;

    public function __construct(TransactionPublic $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getTransaction(): TransactionPublic
    {
        return $this->transaction;
    }
}
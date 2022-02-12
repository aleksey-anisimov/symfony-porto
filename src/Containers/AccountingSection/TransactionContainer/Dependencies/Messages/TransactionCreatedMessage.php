<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Messages;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Models\TransactionPublic;

class TransactionCreatedMessage
{
    public function __construct(private TransactionPublic $transaction)
    {
    }

    public function getTransaction(): TransactionPublic
    {
        return $this->transaction;
    }
}
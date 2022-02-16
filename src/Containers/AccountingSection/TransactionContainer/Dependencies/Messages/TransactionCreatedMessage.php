<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Messages;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Models\TransactionPublic;

class TransactionCreatedMessage
{
    public function __construct(
        private TransactionPublic $transaction,
        private int $sourceBalance,
        private int $destinationBalance
    ) {
    }

    public function getTransaction(): TransactionPublic
    {
        return $this->transaction;
    }

    public function getSourceBalance(): int
    {
        return $this->sourceBalance;
    }

    public function getDestinationBalance(): int
    {
        return $this->destinationBalance;
    }
}
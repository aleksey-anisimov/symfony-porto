<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Dependencies\Transformers;

use App\Containers\AccountingSection\TransactionContainer\Dependencies\Models\TransactionPublic;
use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;

class TransactionToPublicModelTransformer
{
    public function toPublicModel(TransactionInterface $transaction): TransactionPublic
    {
        $transactionPublic = new TransactionPublic();
        $transactionPublic->id = $transaction->getId();
        $transactionPublic->sourceId = $transaction->getSource()->getId();
        $transactionPublic->destinationId = $transaction->getDestination()->getId();
        $transactionPublic->value = $transaction->getValue();

        return $transactionPublic;
    }
}
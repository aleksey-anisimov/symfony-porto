<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Actions;

use App\Containers\AccountingSection\TransactionContainer\Actions\Interfaces\CreateTransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Values\TransactionValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateTransaction extends AbstractAction implements CreateTransactionInterface
{
    public function run(TransactionValue $transactionValue): TransactionInterface
    {
        // get source
        // get destination
        // detect type of transaction
        // validate transaction by type
        // create transaction
    }
}
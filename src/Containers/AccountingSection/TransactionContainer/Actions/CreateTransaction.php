<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Actions;

use App\Containers\AccountingSection\TransactionContainer\Actions\Interfaces\CreateTransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\SaveTransactionTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\ValidateTransactionTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Values\TransactionValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateTransaction extends AbstractAction implements CreateTransactionInterface
{
    public function __construct(
        private SaveTransactionTaskInterface $saveTransactionTask,
        private ValidateTransactionTaskInterface $validateTransactionTask
    ) {
    }

    public function run(TransactionValue $transactionValue): TransactionInterface
    {
        // get source
        // get destination
        // detect type of transaction
        // create transaction without saving
        // validate transaction by type
        // save transaction

        $transaction = new Transaction();
        $this->validateTransactionTask->run($transaction);
        $this->saveTransactionTask->run($transaction);

        return $transaction;
    }
}
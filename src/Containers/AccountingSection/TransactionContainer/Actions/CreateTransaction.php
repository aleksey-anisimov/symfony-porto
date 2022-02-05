<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Actions;

use App\Containers\AccountingSection\TransactionContainer\Actions\Interfaces\CreateTransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Exceptions\AccountNotFoundException;
use App\Containers\AccountingSection\TransactionContainer\Exceptions\TransactionIsNotAllowedException;
use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\SaveTransactionTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\SendTransactionCreatedEventTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\ValidateDestinationAccountTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\ValidateSourceAccountTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Values\TransactionValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateTransaction extends AbstractAction implements CreateTransactionInterface
{
    public function __construct(
        private GetAccountTaskInterface $getAccountTask,
        private ValidateSourceAccountTaskInterface $validateSourceAccountTask,
        private ValidateDestinationAccountTaskInterface $validateDestinationAccountTask,
        private SaveTransactionTaskInterface $saveTransactionTask,
        private SendTransactionCreatedEventTaskInterface $sendTransactionCreatedEventTask,
    ) {
    }

    public function run(TransactionValue $transactionValue): TransactionInterface
    {
        $source = $this->getAccountTask->run($transactionValue->sourceId);

        if (!$source) {
            throw new AccountNotFoundException();
        }

        $destination = $this->getAccountTask->run($transactionValue->destinationId);

        if (!$destination) {
            throw new AccountNotFoundException();
        }

        if (!$this->validateSourceAccountTask->run($source)
            || !$this->validateDestinationAccountTask->run($destination)) {
            throw new TransactionIsNotAllowedException();
        }

        $transaction = new Transaction();
        $transaction->setSource($source);
        $transaction->setDestination($destination);
        $transaction->setComment($transactionValue->comment);
        $transaction->setValue($transactionValue->value);

        $this->saveTransactionTask->run($transaction);
        $this->sendTransactionCreatedEventTask->run($transaction);

        return $transaction;
    }
}
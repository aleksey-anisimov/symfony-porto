<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\MessageHandlers;

use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Dependencies\Messages\TransactionCreatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;

class TransactionCreatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(
        private GetAccountTaskInterface $getAccountTask,
        private SaveAccountTaskInterface $saveAccountTask
    ) {
    }

    public function __invoke(TransactionCreatedMessage $message): void
    {
        // TODO: use actions like in controllers
        $transaction = $message->getTransaction();
        $source = $this->getAccountTask->run($transaction->sourceId);
        $source->setBalance($message->getSourceBalance());
        $this->saveAccountTask->run($source);

        $destination = $this->getAccountTask->run($transaction->destinationId);
        $destination->setBalance($message->getDestinationBalance());
        $this->saveAccountTask->run($destination);
    }
}
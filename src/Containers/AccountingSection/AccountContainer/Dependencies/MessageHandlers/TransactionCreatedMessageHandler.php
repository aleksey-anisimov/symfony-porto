<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\MessageHandlers;

use App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Containers\AccountingSection\TransactionContainer\Dependencies\Messages\TransactionCreatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

class TransactionCreatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(
        private MessageBusInterface $bus,
        private InternalClientInterface $internalClient,
        private GetAccountTaskInterface $getAccountTask,
        private SaveAccountTaskInterface $saveAccountTask
    ) {
        parent::__construct($this->bus);
    }

    public function __invoke(TransactionCreatedMessage $message): void
    {
        // TODO: use actions like in controllers
        // TODO: put balance in TransactionCreatedMessage and don't use internal client
        $transaction = $message->getTransaction();
        $source = $this->getAccountTask->run($transaction->sourceId);
        $sum = $this->internalClient->getTransactionsSum($transaction->sourceId);
        $source->setBalance($sum);
        $this->saveAccountTask->run($source);

        $destination = $this->getAccountTask->run($transaction->destinationId);
        $sum = $this->internalClient->getTransactionsSum($transaction->destinationId);
        $destination->setBalance($sum);
        $this->saveAccountTask->run($destination);
    }
}
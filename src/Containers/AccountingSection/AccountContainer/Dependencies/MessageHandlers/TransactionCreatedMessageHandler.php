<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\MessageHandlers;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\UpdateAccountBalanceActionInterface;
use App\Containers\AccountingSection\AccountContainer\Values\UpdateAccountBalanceValue;
use App\Containers\AccountingSection\TransactionContainer\Dependencies\Messages\TransactionCreatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;

class TransactionCreatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(private UpdateAccountBalanceActionInterface $updateAccountBalanceAction)
    {
    }

    public function __invoke(TransactionCreatedMessage $message): void
    {
        $transaction = $message->getTransaction();

        $sourceBalance = new UpdateAccountBalanceValue($transaction->sourceId, $message->getSourceBalance());
        $this->updateAccountBalanceAction->run($sourceBalance);

        $destinationBalance = new UpdateAccountBalanceValue(
            $transaction->destinationId,
            $message->getDestinationBalance()
        );

        $this->updateAccountBalanceAction->run($destinationBalance);
    }
}
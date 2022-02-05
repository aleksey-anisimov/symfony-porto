<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies;

use App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\AccountingSection\TransactionContainer\Dependencies\Interfaces\InternalApiInterface as TransactionContainerApi;
use App\Ship\Parents\Dependencies\AbstractInternalClient;
use Symfony\Component\Uid\Uuid;

class InternalClient extends AbstractInternalClient implements InternalClientInterface
{
    public function __construct(private TransactionContainerApi $transactionServer)
    {
    }

    public function getTransactionsSum(Uuid $accountId): int
    {
        return $this->transactionServer->getTransactionsSum($accountId);
    }
}
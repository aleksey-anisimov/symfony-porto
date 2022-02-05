<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Data\Repositories;

use App\Containers\AccountingSection\TransactionContainer\Data\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class TransactionRepository extends AbstractRepository implements TransactionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    public function getTransactionsSum(Uuid $accountId): int
    {
        // TODO: write query
        return 0;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Data\Repositories;

use App\Containers\AccountingSection\TransactionContainer\Data\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class TransactionDoctrineRepository extends AbstractDoctrineRepository implements TransactionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    public function getTransactionsSum(string $accountId): int
    {
        // TODO: write query
        return 0;
    }

    public function save(Transaction $transaction): void
    {
        $this->getEntityManager()->persist($transaction);
        $this->getEntityManager()->flush($transaction);
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Data\Repositories;

use App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces\AccountRepositoryInterface;
use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class AccountDoctrineRepository extends AbstractDoctrineRepository implements AccountRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbstractAccount::class);
    }

    public function findById(string $id): ?AbstractAccount
    {
        return $this->find($id);
    }

    public function save(AbstractAccount $account): void
    {
        $this->getEntityManager()->persist($account);
        $this->getEntityManager()->flush($account);
    }
}
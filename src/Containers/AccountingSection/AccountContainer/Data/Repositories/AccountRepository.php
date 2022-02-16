<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Data\Repositories;

use App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces\AccountRepositoryInterface;
use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;
use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;

class AccountRepository extends AbstractRepository implements AccountRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbstractAccount::class);
    }


    public function findById(string $id): ?AccountInterface
    {
        return $this->find($id);
    }

    public function save(AccountInterface $account): void
    {
        $this->getEntityManager()->persist($account);
        $this->getEntityManager()->flush($account);
    }
}
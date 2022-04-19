<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Data\Repositories;

use App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces\OwnerRepositoryInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Owner;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class OwnerDoctrineRepository extends AbstractDoctrineRepository implements OwnerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Owner::class);
    }

    public function findById(string $id): ?Owner
    {
        return $this->find($id);
    }

    public function save(Owner $owner): void
    {
        $this->getEntityManager()->persist($owner);
        $this->getEntityManager()->flush($owner);
    }
}
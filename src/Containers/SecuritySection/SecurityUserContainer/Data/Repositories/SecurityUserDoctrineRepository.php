<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories;

use App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces\SecurityUserRepositoryInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class SecurityUserDoctrineRepository extends AbstractDoctrineRepository implements SecurityUserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecurityUser::class);
    }

    public function findById(string $id): ?SecurityUser
    {
        return $this->find($id);
    }

    public function findByEmail(string $email): ?SecurityUser
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function save(SecurityUser $securityUser): void
    {
        $this->getEntityManager()->persist($securityUser);
        $this->getEntityManager()->flush($securityUser);
    }
}

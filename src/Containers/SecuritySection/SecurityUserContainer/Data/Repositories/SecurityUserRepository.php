<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories;

use App\Containers\SecuritySection\SecurityUserContainer\Data\Repositories\Interfaces\SecurityUserRepositoryInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;

class SecurityUserRepository extends AbstractRepository implements SecurityUserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SecurityUser::class);
    }

    public function findById(string $id): ?SecurityUserInterface
    {
        return $this->find($id);
    }

    public function findByEmail(string $email): ?SecurityUserInterface
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function save(SecurityUserInterface $securityUser): void
    {
        $this->getEntityManager()->persist($securityUser);
        $this->getEntityManager()->flush($securityUser);
    }
}

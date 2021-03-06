<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Data\Repositories;

use App\Containers\UserContainer\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\UserContainer\Models\User;
use App\Ship\Parents\Repositories\AbstractDoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserDoctrineRepository extends AbstractDoctrineRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findById(string $id): ?User
    {
        return $this->find($id);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function save(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush($user);
    }
}

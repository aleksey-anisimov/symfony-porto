<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Data\Repositories;

use App\Containers\UserContainer\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Models\User;
use App\Ship\Parents\Repositories\AbstractRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function findById(Uuid $id): ?UserInterface
    {
        return $this->find($id);
    }

    public function findByEmail(string $email): ?UserInterface
    {
        return $this->findOneBy(['email' => $email]);
    }
}

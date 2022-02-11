<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SaveUserTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveUserTask extends AbstractTask implements SaveUserTaskInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run(UserInterface $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
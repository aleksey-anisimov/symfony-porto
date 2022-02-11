<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Tasks\Interfaces\SaveCredentialsTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveCredentialsTask extends AbstractTask implements SaveCredentialsTaskInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function run(UserInterface $user): void
    {
        // TODO: create doctrine entities and save to database
        $this->entityManager->flush();
    }
}
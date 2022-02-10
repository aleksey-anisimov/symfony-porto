<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks;

use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\SaveSecurityUserTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveSecurityUserTask extends AbstractTask implements SaveSecurityUserTaskInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function run(SecurityUserInterface $securityUser): void
    {
        $this->entityManager->persist($securityUser);
        $this->entityManager->flush($securityUser);
    }
}
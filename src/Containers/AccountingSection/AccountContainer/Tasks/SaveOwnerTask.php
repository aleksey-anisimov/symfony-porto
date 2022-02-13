<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\OwnerInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveOwnerTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveOwnerTask extends AbstractTask implements SaveOwnerTaskInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function run(OwnerInterface $owner): void
    {
        $this->entityManager->persist($owner);
        $this->entityManager->flush($owner);
    }
}
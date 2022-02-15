<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Doctrine\ORM\EntityManagerInterface;

class SaveAccountTask extends AbstractTask implements SaveAccountTaskInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function run(AccountInterface $account): void
    {
        $this->entityManager->persist($account);
        $this->entityManager->flush($account);
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces\OwnerRepositoryInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Owner;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetOwnerTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetOwnerTask extends AbstractTask implements GetOwnerTaskInterface
{
    public function __construct(private OwnerRepositoryInterface $repository)
    {
    }

    public function run(string $id): ?Owner
    {
        return $this->repository->findById($id);
    }
}
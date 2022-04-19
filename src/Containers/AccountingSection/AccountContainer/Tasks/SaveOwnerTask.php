<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces\OwnerRepositoryInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Owner;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveOwnerTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveOwnerTask extends AbstractTask implements SaveOwnerTaskInterface
{
    public function __construct(private OwnerRepositoryInterface $repository)
    {
    }

    public function run(Owner $owner): void
    {
        $this->repository->save($owner);
    }
}
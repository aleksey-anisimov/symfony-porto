<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Data\Repositories\Interfaces\AccountRepositoryInterface;
use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveAccountTask extends AbstractTask implements SaveAccountTaskInterface
{
    public function __construct(private AccountRepositoryInterface $repository)
    {
    }

    public function run(AbstractAccount $account): void
    {
        $this->repository->save($account);
    }
}
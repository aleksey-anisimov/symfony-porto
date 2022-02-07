<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveAccountTask extends AbstractTask implements SaveAccountTaskInterface
{
    public function run(AccountInterface $account): void
    {
        // TODO: Implement run() method.
    }
}
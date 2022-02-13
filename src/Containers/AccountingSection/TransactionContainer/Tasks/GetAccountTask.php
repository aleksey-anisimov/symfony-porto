<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetAccountTask extends AbstractTask implements GetAccountTaskInterface
{
    public function run(string $id): ?AccountInterface
    {
        // TODO: Implement run() method.
    }
}
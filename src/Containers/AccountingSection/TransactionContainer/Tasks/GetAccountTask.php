<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Symfony\Component\Uid\Uuid;

class GetAccountTask extends AbstractTask implements GetAccountTaskInterface
{
    public function run(Uuid $id): ?AccountInterface
    {
        // TODO: Implement run() method.
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Symfony\Component\Uid\Uuid;

class GetAccountTask extends AbstractTask implements GetAccountTaskInterface
{
    public function run(Uuid $uuid): ?AccountInterface
    {
        // TODO: Implement run() method.
    }
}
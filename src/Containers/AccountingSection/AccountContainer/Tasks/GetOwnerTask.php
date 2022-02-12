<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\OwnerInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetOwnerTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Symfony\Component\Uid\Uuid;

class GetOwnerTask extends AbstractTask implements GetOwnerTaskInterface
{
    public function run(Uuid $uuid): ?OwnerInterface
    {
        // TODO: Implement run() method.
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;
use Symfony\Component\Uid\Uuid;

interface GetAccountTaskInterface
{
    public function run(Uuid $id): ?AccountInterface;
}
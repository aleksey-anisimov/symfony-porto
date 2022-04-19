<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Account;

interface GetAccountTaskInterface
{
    public function run(string $id): ?Account;
}
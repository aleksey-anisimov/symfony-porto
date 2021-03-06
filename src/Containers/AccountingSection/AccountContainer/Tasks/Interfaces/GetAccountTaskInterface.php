<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;

interface GetAccountTaskInterface
{
    public function run(string $id): ?AbstractAccount;
}
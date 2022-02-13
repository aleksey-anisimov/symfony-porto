<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;

interface GetAccountTaskInterface
{
    public function run(string $id): ?AccountInterface;
}
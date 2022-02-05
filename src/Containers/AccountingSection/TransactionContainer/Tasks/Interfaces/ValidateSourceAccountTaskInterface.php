<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\AccountInterface;

interface ValidateSourceAccountTaskInterface
{
    public function run(AccountInterface $transaction): bool;
}
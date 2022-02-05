<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;

interface SaveAccountTaskInterface
{
    public function run(AccountInterface $account): void;
}
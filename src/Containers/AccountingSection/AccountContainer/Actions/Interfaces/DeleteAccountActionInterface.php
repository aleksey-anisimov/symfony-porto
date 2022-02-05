<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;

interface DeleteAccountActionInterface
{
    public function run(AccountInterface $account): void;
}
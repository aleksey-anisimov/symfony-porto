<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;

interface DeleteAccountActionInterface
{
    public function run(AbstractAccount $account): void;
}
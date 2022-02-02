<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\AccountContainer\Values\AccountValue;

interface CreateAccountActionInterface
{
    public function run(AccountValue $accountValue): AccountInterface;
}
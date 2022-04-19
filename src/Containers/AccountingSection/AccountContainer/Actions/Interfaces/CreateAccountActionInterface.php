<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;
use App\Containers\AccountingSection\AccountContainer\Values\AccountValue;

interface CreateAccountActionInterface
{
    public function run(AccountValue $accountValue): AbstractAccount;
}
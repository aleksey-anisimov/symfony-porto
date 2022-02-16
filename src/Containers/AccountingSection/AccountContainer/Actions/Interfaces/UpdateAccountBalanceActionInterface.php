<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Values\UpdateAccountBalanceValue;

interface UpdateAccountBalanceActionInterface
{
    public function run(UpdateAccountBalanceValue $updateAccountBalanceValue): void;
}
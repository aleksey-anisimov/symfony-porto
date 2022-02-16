<?php

namespace App\Containers\AccountingSection\AccountContainer\Actions;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\UpdateAccountBalanceActionInterface;
use App\Containers\AccountingSection\AccountContainer\Values\UpdateAccountBalanceValue;
use App\Ship\Parents\Actions\AbstractAction;

class UpdateAccountBalanceActionAction extends AbstractAction implements UpdateAccountBalanceActionInterface
{
    public function run(UpdateAccountBalanceValue $updateAccountBalanceValue): void
    {

    }
}
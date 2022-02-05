<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\CreateAccountActionInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Consumption;
use App\Containers\AccountingSection\AccountContainer\Models\Income;
use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Wallet;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetOwnerTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Values\AccountTypeEnum;
use App\Containers\AccountingSection\AccountContainer\Values\AccountValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateAccountAction extends AbstractAction implements CreateAccountActionInterface
{
    public function __construct(
        private SaveAccountTaskInterface $saveWalletTask,
        private GetOwnerTaskInterface $getOwnerTask
    ) {
    }

    public function run(AccountValue $accountValue): AccountInterface
    {
        $account = $this->createAccountByType($accountValue->type);
        $account->setName($accountValue->name);
        $account->setOwner($this->getOwnerTask->run($accountValue->ownerId));

        $this->saveWalletTask->run($account);

        return $account;
    }

    // TODO: refactor it
    private function createAccountByType(AccountTypeEnum $type): AccountInterface
    {
        if ($type === AccountTypeEnum::INCOME) {
            $account = new Income();
        } elseif ($type === AccountTypeEnum::WALLET) {
            $account = new Wallet();
        } else {
            $account = new Consumption();
        }

        return $account;
    }
}
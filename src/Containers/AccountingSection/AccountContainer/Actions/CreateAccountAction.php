<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\CreateAccountActionInterface;
use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;
use App\Containers\AccountingSection\AccountContainer\Models\Consumption;
use App\Containers\AccountingSection\AccountContainer\Models\Income;
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

    public function run(AccountValue $accountValue): AbstractAccount
    {
        $account = $this->createAccountByType($accountValue->getType());
        $account->setName($accountValue->getName());
        $account->setOwner($this->getOwnerTask->run($accountValue->getOwnerId()));

        $this->saveWalletTask->run($account);

        return $account;
    }

    // TODO: refactor it
    private function createAccountByType(AccountTypeEnum $type): AbstractAccount
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
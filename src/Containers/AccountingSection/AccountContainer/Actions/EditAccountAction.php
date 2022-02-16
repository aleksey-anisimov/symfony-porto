<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\EditAccountActionInterface;
use App\Containers\AccountingSection\AccountContainer\Exceptions\AccountNotFoundException;
use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\GetAccountTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Containers\AccountingSection\AccountContainer\Values\EditAccountValue;
use App\Ship\Parents\Actions\AbstractAction;

class EditAccountAction extends AbstractAction implements EditAccountActionInterface
{
    public function __construct(
        private SaveAccountTaskInterface $saveAccountTask,
        private GetAccountTaskInterface $getAccountTask
    ) {
    }

    public function run(EditAccountValue $editAccountValue): AccountInterface
    {
        $account = $this->getAccountTask->run($editAccountValue->getAccountId());

        if (!$account) {
            throw new AccountNotFoundException();
        }

        $account->setName($editAccountValue->getName());
        $this->saveAccountTask->run($account);

        return $account;
    }
}
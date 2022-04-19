<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\DeleteAccountActionInterface;
use App\Containers\AccountingSection\AccountContainer\Models\AbstractAccount;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveAccountTaskInterface;
use App\Ship\Parents\Actions\AbstractAction;

class DeleteAccountAction extends AbstractAction implements DeleteAccountActionInterface
{
    public function __construct(private SaveAccountTaskInterface $saveAccountTask)
    {
    }

    public function run(AbstractAccount $account): void
    {
        $account->setDeleted(true);
        $this->saveAccountTask->run($account);
    }
}
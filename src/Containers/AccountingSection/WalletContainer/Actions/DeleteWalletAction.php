<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Actions;

use App\Containers\AccountingSection\WalletContainer\Actions\Interfaces\DeleteWalletActionInterface;
use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;
use App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces\SaveWalletTaskInterface;
use App\Ship\Parents\Actions\AbstractAction;

class DeleteWalletAction extends AbstractAction implements DeleteWalletActionInterface
{
    public function __construct(private SaveWalletTaskInterface $saveWalletTask)
    {
    }

    public function run(WalletInterface $wallet): void
    {
        $wallet->setDeleted(true);
        $this->saveWalletTask->run($wallet);
    }
}
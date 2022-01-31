<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Actions;

use App\Containers\AccountingSection\WalletContainer\Actions\Interfaces\EditWalletActionInterface;
use App\Containers\AccountingSection\WalletContainer\Exceptions\WalletNotFoundException;
use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;
use App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces\GetWalletTaskInterface;
use App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces\SaveWalletTaskInterface;
use App\Containers\AccountingSection\WalletContainer\Values\EditWalletValue;
use App\Ship\Parents\Actions\AbstractAction;

class EditWalletAction extends AbstractAction implements EditWalletActionInterface
{
    public function __construct(
        private SaveWalletTaskInterface $saveWalletTask,
        private GetWalletTaskInterface $getWalletTask
    ) {
    }

    public function run(EditWalletValue $editWalletValue): WalletInterface
    {
        $wallet = $this->getWalletTask->run($editWalletValue->walletId);

        if (!$wallet) {
            throw new WalletNotFoundException();
        }

        $wallet->setName($editWalletValue->name);

        $this->saveWalletTask->run($wallet);

        return $wallet;
    }
}
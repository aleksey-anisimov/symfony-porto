<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Actions;

use App\Containers\AccountingSection\WalletContainer\Actions\Interfaces\CreateWalletActionInterface;
use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;
use App\Containers\AccountingSection\WalletContainer\Models\Wallet;
use App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces\GetOwnerTaskInterface;
use App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces\SaveWalletTaskInterface;
use App\Containers\AccountingSection\WalletContainer\Values\WalletValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateWalletAction extends AbstractAction implements CreateWalletActionInterface
{
    public function __construct(private SaveWalletTaskInterface $saveWalletTask, private GetOwnerTaskInterface $getOwnerTask)
    {
    }

    public function run(WalletValue $walletValue): WalletInterface
    {
        $wallet = new Wallet();
        $wallet->setName($walletValue->name);
        $wallet->setOwner($this->getOwnerTask->run($walletValue->ownerId));

        $this->saveWalletTask->run($wallet);

        return $wallet;
    }
}
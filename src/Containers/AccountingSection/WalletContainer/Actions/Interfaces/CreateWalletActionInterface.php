<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Actions\Interfaces;

use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;
use App\Containers\AccountingSection\WalletContainer\Values\WalletValue;

interface CreateWalletActionInterface
{
    public function run(WalletValue $walletValue): WalletInterface;
}
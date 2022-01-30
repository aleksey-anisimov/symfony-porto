<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Actions\Interfaces;

use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;

interface DeleteWalletActionInterface
{
    public function run(WalletInterface $wallet): void;
}
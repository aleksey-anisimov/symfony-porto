<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;

interface SaveWalletTaskInterface
{
    public function run(WalletInterface $wallet): void;
}
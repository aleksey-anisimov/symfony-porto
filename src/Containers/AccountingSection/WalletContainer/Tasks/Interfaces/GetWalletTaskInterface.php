<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;
use Symfony\Component\Uid\Uuid;

interface GetWalletTaskInterface
{
    public function run(Uuid $uuid): ?WalletInterface;
}
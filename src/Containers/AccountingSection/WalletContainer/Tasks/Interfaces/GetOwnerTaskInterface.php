<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Tasks\Interfaces;

use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\OwnerInterface;
use Symfony\Component\Uid\Uuid;

interface GetOwnerTaskInterface
{
    public function run(Uuid $uuid): ?OwnerInterface;
}
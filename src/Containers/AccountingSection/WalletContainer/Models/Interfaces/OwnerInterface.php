<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface OwnerInterface
{
    public function getId(): Uuid;
}
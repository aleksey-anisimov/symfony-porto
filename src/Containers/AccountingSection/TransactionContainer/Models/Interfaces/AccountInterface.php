<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface AccountInterface
{
    public function getId(): Uuid;
}
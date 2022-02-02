<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\Interfaces;

use Symfony\Component\Uid\Uuid;

interface InternalClientInterface
{
    public function getTransactionsSum(Uuid $accountId): int;
}
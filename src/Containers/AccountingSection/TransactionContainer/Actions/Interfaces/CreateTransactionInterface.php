<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Actions\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Containers\AccountingSection\TransactionContainer\Values\TransactionValue;

interface CreateTransactionInterface
{
    public function run(TransactionValue $transactionValue): TransactionInterface;
}
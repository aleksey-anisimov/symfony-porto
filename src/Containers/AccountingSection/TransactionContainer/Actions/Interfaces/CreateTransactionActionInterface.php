<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Actions\Interfaces;

use App\Containers\AccountingSection\TransactionContainer\Models\Transaction;
use App\Containers\AccountingSection\TransactionContainer\Values\TransactionValue;

interface CreateTransactionActionInterface
{
    public function run(TransactionValue $transactionValue): Transaction;
}
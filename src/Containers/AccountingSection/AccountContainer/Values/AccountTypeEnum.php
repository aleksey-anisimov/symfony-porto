<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Values;

enum AccountTypeEnum: string
{
    case INCOME = 'income';

    case WALLET = 'wallet';

    case CONSUMPTION = 'consumption';
}
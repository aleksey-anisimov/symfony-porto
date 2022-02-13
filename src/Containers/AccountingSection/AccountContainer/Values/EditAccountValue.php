<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class EditAccountValue extends AbstractValue
{
    public string $name;

    public string $accountId;
}
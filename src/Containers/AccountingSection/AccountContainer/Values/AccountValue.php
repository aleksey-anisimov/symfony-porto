<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;

class AccountValue extends AbstractValue
{
    public string $name;

    public Uuid $ownerId;

    public AccountTypeEnum $type;
}
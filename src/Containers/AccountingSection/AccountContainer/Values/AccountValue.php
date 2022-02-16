<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class AccountValue extends AbstractValue
{
    public function __construct(private string $name, private string $ownerId, private AccountTypeEnum $type)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOwnerId(): string
    {
        return $this->ownerId;
    }

    public function getType(): AccountTypeEnum
    {
        return $this->type;
    }
}
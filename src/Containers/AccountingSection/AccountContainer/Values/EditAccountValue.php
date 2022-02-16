<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class EditAccountValue extends AbstractValue
{
    public function __construct(private string $name, private string $accountId)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAccountId(): string
    {
        return $this->accountId;
    }
}
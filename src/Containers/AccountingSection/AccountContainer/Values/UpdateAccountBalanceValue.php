<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class UpdateAccountBalanceValue extends AbstractValue
{
    public function __construct(private string $id, private int $balance)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }
}
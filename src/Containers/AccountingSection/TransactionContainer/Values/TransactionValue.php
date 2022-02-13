<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class TransactionValue extends AbstractValue
{
    public string $sourceId;

    public string $destinationId;

    public string $comment;

    public int $value;
}
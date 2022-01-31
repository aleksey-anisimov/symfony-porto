<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;

class TransactionValue extends AbstractValue
{
    public Uuid $sourceId;

    public Uuid $destination;

    public string $comment;

    public int $value;
}
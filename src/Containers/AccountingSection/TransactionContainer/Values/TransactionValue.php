<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class TransactionValue extends AbstractValue
{
    public function __construct(
        private string $sourceId,
        private string $destinationId,
        private string $comment,
        private int $value
    ) {
    }

    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    public function getDestinationId(): string
    {
        return $this->destinationId;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Values;

class CreateOwnerValue
{
    public function __construct(private string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\ConsumptionContainer\Models;

use App\Containers\AccountingSection\ConsumptionContainer\Models\Interfaces\ConsumptionInterface;
use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\OwnerInterface;
use App\Ship\Parents\Models\AbstractAccount;
use Symfony\Component\Uid\Uuid;

class Consumption extends AbstractAccount implements ConsumptionInterface
{
    private Uuid $id;

    private string $name = '';

    private bool $deleted = false;

    private OwnerInterface $owner;

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ConsumptionInterface
    {
        $this->name = $name;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): ConsumptionInterface
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getOwner(): OwnerInterface
    {
        return $this->owner;
    }

    public function setOwner(OwnerInterface $owner): ConsumptionInterface
    {
        $this->owner = $owner;

        return $this;
    }
}
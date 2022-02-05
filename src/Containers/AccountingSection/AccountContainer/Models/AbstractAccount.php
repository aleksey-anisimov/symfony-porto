<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Models;

use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\AccountInterface;
use App\Containers\AccountingSection\AccountContainer\Models\Interfaces\OwnerInterface;
use App\Containers\AccountingSection\AccountContainer\Values\AccountTypeEnum;
use App\Ship\Parents\Models\AbstractModel;
use Symfony\Component\Uid\Uuid;

abstract class AbstractAccount extends AbstractModel implements AccountInterface
{
    protected Uuid $id;

    protected string $name = '';

    protected bool $deleted = false;

    protected OwnerInterface $owner;

    protected AccountTypeEnum $type;

    protected int $balance = 0;

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AccountInterface
    {
        $this->name = $name;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): AccountInterface
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getOwner(): OwnerInterface
    {
        return $this->owner;
    }

    public function setOwner(OwnerInterface $owner): AccountInterface
    {
        $this->owner = $owner;

        return $this;
    }

    public function getType(): AccountTypeEnum
    {
        return $this->type;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): AccountInterface
    {
        $this->balance = $balance;

        return $this;
    }
}
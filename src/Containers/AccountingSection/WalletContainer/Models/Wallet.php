<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Models;

use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\OwnerInterface;
use App\Containers\AccountingSection\WalletContainer\Models\Interfaces\WalletInterface;
use App\Ship\Parents\Models\AbstractAccount;
use App\Ship\Parents\Models\Interfaces\AccountInterface;
use Symfony\Component\Uid\Uuid;

class Wallet extends AbstractAccount implements AccountInterface, WalletInterface
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

    public function setName(string $name): WalletInterface
    {
        $this->name = $name;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): WalletInterface
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getOwner(): OwnerInterface
    {
        return $this->owner;
    }

    public function setOwner(OwnerInterface $owner): WalletInterface
    {
        $this->owner = $owner;

        return $this;
    }
}
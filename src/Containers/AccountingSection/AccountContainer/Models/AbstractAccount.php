<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Models;

use App\Containers\AccountingSection\AccountContainer\Values\AccountTypeEnum;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'accounting_section_account_container_account')]
abstract class AbstractAccount extends AbstractModel
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    protected string $id;

    #[ORM\Column(type: 'string')]
    protected string $name = '';

    #[ORM\Column(type: 'boolean')]
    protected bool $deleted = false;

    #[ORM\ManyToOne(targetEntity: Owner::class)]
    #[ORM\JoinColumn(nullable: false)]
    protected Owner $owner;

    #[ORM\Column(type: 'string')]
    protected AccountTypeEnum $type;

    #[ORM\Column(type: 'integer')]
    protected int $balance = 0;

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AbstractAccount
    {
        $this->name = $name;

        return $this;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): AbstractAccount
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getOwner(): Owner
    {
        return $this->owner;
    }

    public function setOwner(Owner $owner): AbstractAccount
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

    public function setBalance(int $balance): AbstractAccount
    {
        $this->balance = $balance;

        return $this;
    }
}
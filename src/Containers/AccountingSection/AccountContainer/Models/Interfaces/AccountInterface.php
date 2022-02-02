<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Models\Interfaces;

use App\Containers\AccountingSection\AccountContainer\Values\AccountTypeEnum;
use Symfony\Component\Uid\Uuid;

interface AccountInterface
{
    public function getId(): Uuid;

    public function getName(): string;

    public function setName(string $name): AccountInterface;

    public function isDeleted(): bool;

    public function setDeleted(bool $deleted): AccountInterface;

    public function getOwner(): OwnerInterface;

    public function setOwner(OwnerInterface $owner): AccountInterface;

    public function getType(): AccountTypeEnum;

    public function getBalance(): int;

    public function setBalance(int $balance): AccountInterface;
}
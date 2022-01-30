<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\WalletContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface WalletInterface
{
    public function getId(): Uuid;

    public function getName(): string;

    public function setName(string $name): WalletInterface;

    public function isDeleted(): bool;

    public function setDeleted(bool $deleted): WalletInterface;
}
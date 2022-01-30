<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\ConsumptionContainer\Models\Interfaces;

use App\Ship\Parents\Models\Interfaces\AccountInterface;
use Symfony\Component\Uid\Uuid;

interface ConsumptionInterface extends AccountInterface
{
    public function getId(): Uuid;

    public function getName(): string;

    public function setName(string $name): ConsumptionInterface;

    public function isDeleted(): bool;

    public function setDeleted(bool $deleted): ConsumptionInterface;
}
<?php

declare(strict_types=1);

namespace App\Ship\Parents\Entities;

abstract class AbstractEntity
{
    abstract public function getId(): string;
}
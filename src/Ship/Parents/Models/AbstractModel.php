<?php

declare(strict_types=1);

namespace App\Ship\Parents\Models;

abstract class AbstractModel
{
    abstract public function getId(): string;
}
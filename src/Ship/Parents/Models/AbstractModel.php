<?php

declare(strict_types=1);

namespace App\Ship\Parents\Models;

use Symfony\Component\Uid\Uuid;

abstract class AbstractModel
{
    abstract public function getId(): Uuid;
}
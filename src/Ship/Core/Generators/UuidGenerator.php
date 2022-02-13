<?php

declare(strict_types=1);

namespace App\Ship\Core\Generators;

use Symfony\Component\Uid\Uuid;

class UuidGenerator
{
    public static function uuidString(?string $uuid): string
    {
        return $uuid ?: Uuid::v4()->toRfc4122();
    }
}
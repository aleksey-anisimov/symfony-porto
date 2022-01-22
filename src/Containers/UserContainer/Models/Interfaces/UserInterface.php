<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface UserInterface
{
    public function getId(): Uuid;

    public function getEmail(): string;
}
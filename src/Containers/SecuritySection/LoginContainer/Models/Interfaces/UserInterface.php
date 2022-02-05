<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface UserInterface
{
    public function getId(): Uuid;

    public function getEmail(): string;

    public function setEmail(string $email): UserInterface;

    public function getRoles(): array;

    public function setRoles(array $roles): UserInterface;
}
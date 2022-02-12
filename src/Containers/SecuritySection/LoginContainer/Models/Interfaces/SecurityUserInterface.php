<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Models\Interfaces;

use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;
use Symfony\Component\Uid\Uuid;

interface SecurityUserInterface extends SymfonyUserInterface
{
    public function getId(): Uuid;

    public function getEmail(): string;

    public function setEmail(string $email): SecurityUserInterface;

    public function getRoles(): array;

    public function setRoles(array $roles): SecurityUserInterface;
}
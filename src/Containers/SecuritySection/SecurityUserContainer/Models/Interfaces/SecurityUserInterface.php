<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;
use Symfony\Component\Security\Core\User\UserInterface as SymfonyUserInterface;

interface SecurityUserInterface extends SymfonyUserInterface
{
    public function getId(): Uuid;

    public function getEmail(): string;

    public function setEmail(string $email): SecurityUserInterface;

    public function getRoles(): array;

    public function setRoles(array $roles): SecurityUserInterface;
}
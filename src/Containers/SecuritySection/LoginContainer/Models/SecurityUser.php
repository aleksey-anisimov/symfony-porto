<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Models;

use App\Ship\Parents\Models\AbstractModel;

class SecurityUser extends AbstractModel
{
    public function __construct(private ?string $id, private string $email, private array $roles)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }
}
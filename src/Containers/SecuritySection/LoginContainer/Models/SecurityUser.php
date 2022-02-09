<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Models;

use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\SecurityUserInterface;
use App\Ship\Parents\Models\AbstractModel;
use Symfony\Component\Uid\Uuid;

class SecurityUser extends AbstractModel implements SecurityUserInterface
{
    private Uuid $id;

    private string $email = '';

    private array $roles = [];

    private string $password = '';

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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
<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Models;

use App\Containers\SecuritySection\LoginContainer\Models\Interfaces\SecurityUserInterface;
use App\Ship\Parents\Models\AbstractModel;
use Symfony\Component\Uid\Uuid;

class SecurityUser extends AbstractModel implements SecurityUserInterface
{
    public function __construct(private ?Uuid $id, private string $email, private array $roles)
    {
    }

    public function getId(): Uuid
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
<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class UserValue extends AbstractValue
{
    public function __construct(
        private ?string $id,
        private string $email,
        private string $password,
        private string $firstname,
        private array $roles
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}
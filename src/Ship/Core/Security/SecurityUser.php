<?php

declare(strict_types=1);

namespace App\Ship\Core\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;

class SecurityUser implements JWTUserInterface
{
    private string $id;

    private array $roles;

    private string $email;

    public function __construct(string $uuid, $email, array $roles)
    {
        $this->id = $uuid;
        $this->email = $email;
        $this->roles = $roles;
    }

    public static function createFromPayload($username, array $payload): SecurityUser
    {
        return new self($payload['id'], $username, $payload['roles']);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }
}
<?php

declare(strict_types=1);

namespace App\Ship\Core\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserInterface;
use Symfony\Component\Uid\Uuid;

class SecurityUser implements JWTUserInterface
{
    private Uuid $id;

    private array $roles;

    private string $email;

    public function __construct(Uuid $uuid, $email, array $roles)
    {
        $this->id = $uuid;
        $this->email = $email;
        $this->roles = $roles;
    }

    public static function createFromPayload($username, array $payload): SecurityUser
    {
        return new self(Uuid::fromString($payload['id']), $username, $payload['roles']);
    }

    public function getId(): Uuid
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
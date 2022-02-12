<?php

declare(strict_types=1);

namespace App\Ship\Core\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class DecoratedSecurityUser implements UserInterface
{
    public function __construct(private SecurityUser $securityUser)
    {
    }

    public function getRoles(): array
    {
        return $this->securityUser->getRoles();
    }

    public function eraseCredentials(): void
    {
    }

    public function getEmail(): string
    {
        return $this->securityUser->getEmail();
    }

    public function getUserIdentifier(): string
    {
        return $this->securityUser->getEmail();
    }
}
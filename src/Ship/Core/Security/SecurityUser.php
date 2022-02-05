<?php

declare(strict_types=1);

namespace App\Ship\Core\Security;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;

class SecurityUser
{
    private Uuid $id;

    private array $roles;

    public function __construct(UserInterface $user)
    {
        $this->roles = $user->getRoles();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}
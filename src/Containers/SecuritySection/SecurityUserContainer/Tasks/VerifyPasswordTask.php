<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks;

use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\VerifyPasswordTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class VerifyPasswordTask extends AbstractTask implements VerifyPasswordTaskInterface
{
    public function __construct(private UserPasswordHasherInterface $symfonyPasswordHasher)
    {
    }

    public function run(SecurityUser $securityUser, string $password): bool
    {
        // TODO: create decorated object with Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface
        return $this->symfonyPasswordHasher->isPasswordValid($securityUser, $password);
    }
}
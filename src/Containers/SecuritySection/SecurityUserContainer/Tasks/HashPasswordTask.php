<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks;

use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces\HashPasswordTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HashPasswordTask extends AbstractTask implements HashPasswordTaskInterface
{
    public function __construct(private UserPasswordHasherInterface $symfonyPasswordHasher)
    {
    }

    public function run(SecurityUserInterface $securityUser, string $password): string
    {
        // TODO: create decorated object with Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface
        return $this->symfonyPasswordHasher->hashPassword($securityUser, $password);
    }
}
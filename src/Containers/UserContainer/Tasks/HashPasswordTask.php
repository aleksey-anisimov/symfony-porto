<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Tasks;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Containers\UserContainer\Tasks\Interfaces\HashPasswordTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HashPasswordTask extends AbstractTask implements HashPasswordTaskInterface
{
    public function __construct(private UserPasswordHasherInterface $symfonyPasswordHasher)
    {
    }

    public function run(UserInterface $user, string $password): string
    {
        return $this->symfonyPasswordHasher->hashPassword($user, $password);
    }
}
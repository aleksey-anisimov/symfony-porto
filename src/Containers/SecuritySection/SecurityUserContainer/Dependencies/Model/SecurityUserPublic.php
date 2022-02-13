<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Model;

use Symfony\Component\Uid\Uuid;

class SecurityUserPublic
{
    public Uuid $id;

    public string $email;

    public array $roles;
}
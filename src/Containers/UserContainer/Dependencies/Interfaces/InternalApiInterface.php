<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Interfaces;

use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use Symfony\Component\Uid\Uuid;

interface InternalApiInterface
{
    public function getUserById(Uuid $id): ?UserPublic;
}
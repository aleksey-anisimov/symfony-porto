<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Actions\Interfaces;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use Symfony\Component\Uid\Uuid;

interface GetUserByIdActionInterface
{
    public function run(Uuid $id): ?UserInterface;
}
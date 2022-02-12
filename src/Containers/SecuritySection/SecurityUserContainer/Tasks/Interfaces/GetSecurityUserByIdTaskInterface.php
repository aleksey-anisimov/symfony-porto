<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Models\SecurityUser;
use Symfony\Component\Uid\Uuid;

interface GetSecurityUserByIdTaskInterface
{
    public function run(Uuid $id): ?SecurityUser;
}
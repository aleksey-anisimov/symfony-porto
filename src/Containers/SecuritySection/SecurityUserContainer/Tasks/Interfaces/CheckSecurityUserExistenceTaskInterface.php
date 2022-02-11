<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Tasks\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Values\IdentityValue;

interface CheckSecurityUserExistenceTaskInterface
{
    public function run(IdentityValue $identity): bool;
}
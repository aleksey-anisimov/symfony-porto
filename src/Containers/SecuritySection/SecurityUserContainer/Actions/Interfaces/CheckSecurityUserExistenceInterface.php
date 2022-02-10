<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Values\IdentityValue;

interface CheckSecurityUserExistenceInterface
{
    public function run(IdentityValue $identity): bool;
}
<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Values\SecurityUserValue;

interface CreateSecurityUserActionInterface
{
    public function run(SecurityUserValue $securityUserValue): bool;
}
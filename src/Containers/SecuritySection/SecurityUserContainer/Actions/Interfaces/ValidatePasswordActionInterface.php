<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Actions\Interfaces;

use App\Containers\SecuritySection\SecurityUserContainer\Values\CredentialsValue;

interface ValidatePasswordActionInterface
{
    public function run(CredentialsValue $credentials): bool;
}
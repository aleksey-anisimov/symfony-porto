<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Actions\Interfaces;

use App\Containers\SecuritySection\LoginContainer\Values\CredentialsValue;
use App\Containers\SecuritySection\LoginContainer\Values\TokenValue;

interface LoginActionInterface
{
    public function run(CredentialsValue $credentials): ?TokenValue;
}
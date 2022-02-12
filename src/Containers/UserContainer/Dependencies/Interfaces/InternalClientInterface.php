<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies\Interfaces;

interface InternalClientInterface
{
    public function checkSecurityUserExistence(): bool;
}
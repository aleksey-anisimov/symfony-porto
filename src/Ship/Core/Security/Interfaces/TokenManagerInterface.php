<?php

declare(strict_types=1);

namespace App\Ship\Core\Security\Interfaces;

use App\Ship\Core\Security\SecurityUser;

interface TokenManagerInterface
{
    public function createToken(SecurityUser $securityUser): string;
}
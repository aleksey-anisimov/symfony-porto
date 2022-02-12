<?php

declare(strict_types=1);

namespace App\Ship\Core\Security;

use App\Ship\Core\Security\Interfaces\TokenManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class TokenManager implements TokenManagerInterface
{
    public function __construct(private JWTTokenManagerInterface $tokenManager)
    {
    }

    public function createToken(SecurityUser $securityUser): string
    {
        return $this->tokenManager->createFromPayload(
            new DecoratedSecurityUser($securityUser),
            ['id' => $securityUser->getId()]
        );
    }
}
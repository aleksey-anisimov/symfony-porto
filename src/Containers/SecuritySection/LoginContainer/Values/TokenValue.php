<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class TokenValue extends AbstractValue
{
    private string $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}

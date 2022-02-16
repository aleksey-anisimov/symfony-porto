<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class TokenValue extends AbstractValue
{
    public function __construct(private string $token)
    {
        $this->token = $token;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}

<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\UI\API\Responses;

use App\Containers\SecuritySection\LoginContainer\Values\TokenValue;
use App\Ship\Parents\Requests\AbstractRequest;

class LoginResponse extends AbstractRequest
{
    private string $token;

    public function __construct(TokenValue $tokenValue)
    {
        $this->token = $tokenValue->getToken();
    }

    public function getToken(): string
    {
        return $this->token;
    }
}

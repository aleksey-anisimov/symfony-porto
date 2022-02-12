<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\UI\API\Responses;

use App\Containers\SecuritySection\LoginContainer\Values\TokenValue;
use App\Ship\Parents\Requests\AbstractRequest;

class LoginResponse extends AbstractRequest
{
    public string $token;

    public function __construct(TokenValue $tokenValue)
    {
        $this->token = $tokenValue->getToken();
    }
}

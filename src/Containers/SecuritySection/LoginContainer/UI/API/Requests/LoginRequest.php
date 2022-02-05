<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\UI\API\Requests;

use App\Ship\Parents\Requests\AbstractRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class LoginRequest extends AbstractRequest
{
    #[Assert\NotBlank]
    public ?string $email = null;

    #[Assert\NotBlank]
    public ?string $password = null;

    public static function createFromRequest(Request $request): self
    {
        $content = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $articleCreateRequest = new self();
        $articleCreateRequest->email = $content['email'] ?? null;
        $articleCreateRequest->password = $content['password'] ?? null;

        return $articleCreateRequest;
    }
}

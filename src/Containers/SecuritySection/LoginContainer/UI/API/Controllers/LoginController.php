<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\UI\API\Controllers;

use App\Containers\SecuritySection\LoginContainer\Actions\Interfaces\LoginActionInterface;
use App\Containers\SecuritySection\LoginContainer\UI\API\Requests\LoginRequest;
use App\Containers\SecuritySection\LoginContainer\UI\API\Responses\LoginResponse;
use App\Containers\SecuritySection\LoginContainer\Values\CredentialsValue;
use App\Ship\Core\Abstracts\Http\JsonResponse;
use App\Ship\Core\Abstracts\Validators\ValidatorInterface;
use App\Ship\Parents\Controllers\AbstractApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

#[AsController]
#[Route(path: '/api/login', name: 'security_section_login_container_api_login', methods: ['POST'])]
class LoginController extends AbstractApiController
{
    public function __construct(private LoginActionInterface $loginAction, private ValidatorInterface $validator)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $loginRequest = LoginRequest::createFromRequest($request); // TODO: refactor it
        $this->validator->validate($loginRequest);

        $credentials = new CredentialsValue($loginRequest->email, $loginRequest->password);
        $tokenValue = $this->loginAction->run($credentials);

        if (!$tokenValue) {
            throw new BadCredentialsException();
        }

        return new JsonResponse(new LoginResponse($tokenValue));
    }
}

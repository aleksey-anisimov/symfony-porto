<?php

declare(strict_types=1);

namespace App\Ship\Core\Abstracts\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class RequestResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        return true;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        yield 1;
    }
}
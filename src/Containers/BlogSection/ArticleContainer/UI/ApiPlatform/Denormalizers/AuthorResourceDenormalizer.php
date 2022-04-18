<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Denormalizers;

use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\AuthorResource;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class AuthorResourceDenormalizer implements DenormalizerInterface
{
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): AuthorResource
    {
        $authorResource = new AuthorResource();
        $authorResource->id = $data['id'];
        $authorResource->firstname = $data['firstname'];

        return $authorResource;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return $type === AuthorResource::class;
    }
}
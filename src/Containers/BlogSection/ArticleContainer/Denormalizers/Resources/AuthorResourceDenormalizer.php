<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Resources;

use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\AuthorResource;
use App\Ship\Parents\Denormalizers\AbstractDenormalizer;

class AuthorResourceDenormalizer extends AbstractDenormalizer
{
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): AuthorResource
    {
        $authorResource = new AuthorResource();
        $authorResource->id = $data['id'];
        $authorResource->firstname = $data['firstname'];

        return $authorResource;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return $type === AuthorResource::class;
    }
}
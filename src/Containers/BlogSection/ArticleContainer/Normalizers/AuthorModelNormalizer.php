<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Normalizers;

use App\Containers\BlogSection\ArticleContainer\Models\Author;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AuthorModelNormalizer implements NormalizerInterface
{
    /**
     * @param Author $object
     */
    public function normalize(mixed $object, string $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'firstname' => $object->getFirstname(),
        ];
    }

    public function supportsNormalization(mixed $data, string $format = null): bool
    {
        return $data instanceof Author;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Normalizers\Entities;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Author;
use App\Ship\Parents\Normalizers\AbstractNormalizer;

class AuthorEntityNormalizer extends AbstractNormalizer
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

    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof Author;
    }
}
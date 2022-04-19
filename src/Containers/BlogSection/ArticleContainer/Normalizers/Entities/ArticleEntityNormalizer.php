<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Normalizers\Entities;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Article;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ArticleEntityNormalizer implements NormalizerInterface
{
    public function __construct(private AuthorEntityNormalizer $authorEntityNormalizer)
    {
    }

    /**
     * @param Article $object
     */
    public function normalize(mixed $object, string $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'title' => $object->getTitle(),
            'text' => $object->getText(),
            'author' => $this->authorEntityNormalizer->normalize($object->getAuthor()),
        ];
    }

    public function supportsNormalization(mixed $data, string $format = null): bool
    {
        return $data instanceof Article;
    }
}
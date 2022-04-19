<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Normalizers\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Article;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ArticleModelNormalizer implements NormalizerInterface
{
    public function __construct(private AuthorModelNormalizer $authorModelNormalizer)
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
            'author' => $this->authorModelNormalizer->normalize($object->getAuthor()),
            'disabled' => $object->isDisabled(),
        ];
    }

    public function supportsNormalization(mixed $data, string $format = null): bool
    {
        return $data instanceof Article;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Entities;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Article;
use App\Containers\BlogSection\ArticleContainer\Data\Entities\Author;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ArticleEntityDenormalizer implements DenormalizerInterface
{
    public function __construct(private AuthorEntityDenormalizer $authorResourceDenormalizer)
    {
    }

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Article
    {
        $articleEntity = new Article($data['id']);
        $articleEntity->setTitle($data['title']);
        $articleEntity->setText($data['text']);
        $articleEntity->setDisabled($data['disabled']);

        $author = $this->authorResourceDenormalizer->denormalize(
            $data['author'],
            Author::class,
            $format,
            $context
        );

        $articleEntity->setAuthor($author);

        return $articleEntity;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return $type === Article::class;
    }
}
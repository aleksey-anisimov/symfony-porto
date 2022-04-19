<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Ship\Parents\Denormalizers\AbstractDenormalizer;

class ArticleModelDenormalizer extends AbstractDenormalizer
{
    public function __construct(private AuthorModelDenormalizer $authorModelDenormalizer)
    {
    }

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Article
    {
        return new Article(
            $data['id'],
            $data['title'],
            $data['text'],
            $this->authorModelDenormalizer->denormalize($data['author'], Author::class, $format, $context),
            $data['disabled'],
        );
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return $type === Article::class;
    }
}
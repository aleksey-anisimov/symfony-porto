<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Resources;

use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\ArticleResource;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\AuthorResource;
use App\Ship\Parents\Denormalizers\AbstractDenormalizer;

class ArticleResourceDenormalizer extends AbstractDenormalizer
{
    public function __construct(private AuthorResourceDenormalizer $authorResourceDenormalizer)
    {
    }

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): ArticleResource
    {
        $articleResource = new ArticleResource();
        $articleResource->id = $data['id'];
        $articleResource->title = $data['title'];
        $articleResource->text = $data['text'];
        $articleResource->author = $this->authorResourceDenormalizer->denormalize(
            $data['author'],
            AuthorResource::class,
            $format,
            $context
        );

        return $articleResource;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return $type === ArticleResource::class;
    }
}
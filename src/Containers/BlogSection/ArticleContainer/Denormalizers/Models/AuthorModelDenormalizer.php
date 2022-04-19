<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Ship\Parents\Denormalizers\AbstractDenormalizer;

class AuthorModelDenormalizer extends AbstractDenormalizer
{
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Author
    {
        return new Author($data['id'], $data['firstname']);
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return $type === Author::class;
    }
}
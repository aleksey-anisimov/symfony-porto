<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Entities;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Author;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class AuthorEntityDenormalizer implements DenormalizerInterface
{
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Author
    {
        $authorEntity = new Author($data['id']);
        $authorEntity->setFirstname($data['firstname']);

        return $authorEntity;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return $type === Author::class;
    }
}
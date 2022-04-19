<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Entities;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Author;
use App\Ship\Parents\Denormalizers\AbstractDenormalizer;
use Doctrine\ORM\EntityManagerInterface;

class AuthorEntityDenormalizer extends AbstractDenormalizer
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Author
    {
        $authorEntity = $this->entityManager->find(Author::class, $data['id']);

        if (!$authorEntity) {
            $authorEntity = new Author($data['id']);
        }

        $authorEntity->setFirstname($data['firstname']);

        return $authorEntity;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return $type === Author::class;
    }
}
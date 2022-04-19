<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Denormalizers\Entities;

use App\Containers\BlogSection\ArticleContainer\Data\Entities\Article;
use App\Containers\BlogSection\ArticleContainer\Data\Entities\Author;
use App\Ship\Parents\Denormalizers\AbstractDenormalizer;
use Doctrine\ORM\EntityManagerInterface;

class ArticleEntityDenormalizer extends AbstractDenormalizer
{
    public function __construct(
        private AuthorEntityDenormalizer $authorResourceDenormalizer,
        private EntityManagerInterface $entityManager
    ) {
    }

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Article
    {
        $articleEntity = $this->entityManager->find(Article::class, $data['id']);

        if (!$articleEntity) {
            $articleEntity = new Article($data['id']);
        }

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

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return $type === Article::class;
    }
}
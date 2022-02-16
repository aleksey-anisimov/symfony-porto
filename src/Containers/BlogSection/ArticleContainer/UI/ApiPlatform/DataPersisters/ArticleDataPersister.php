<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\DataPersisters;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\ArticleResource;
use App\Containers\BlogSection\ArticleContainer\Values\CreateArticleValue;

class ArticleDataPersister implements ContextAwareDataPersisterInterface
{
    public function __construct(private CreateArticleActionInterface $createArticleAction)
    {
    }

    /**
     * @param ArticleResource $data
     */
    public function persist($data, array $context = []): ArticleResource
    {
        $articleValue = new CreateArticleValue($data->title, $data->text, $data->authorId);

        $article = $this->createArticleAction->run($articleValue);

        return ArticleResource::fromModel($article);
    }

    public function remove($data, array $context = []): void
    {
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof ArticleResource;
    }
}

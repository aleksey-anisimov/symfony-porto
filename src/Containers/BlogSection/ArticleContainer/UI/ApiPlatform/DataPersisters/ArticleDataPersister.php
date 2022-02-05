<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\DataPersisters;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetAuthorByIdActionInterface;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\ArticleResource;
use App\Containers\BlogSection\ArticleContainer\Values\ArticleValue;

class ArticleDataPersister implements ContextAwareDataPersisterInterface
{
    public function __construct(
        private CreateArticleActionInterface $createArticleAction,
        private GetAuthorByIdActionInterface $getAuthorByIdAction
    ) {
    }

    /**
     * @param ArticleResource $data
     */
    public function persist($data, array $context = []): ArticleResource
    {
        $articleValue = new ArticleValue();
        $articleValue->title = $data->title;
        $articleValue->text = $data->text;
        $articleValue->author = $this->getAuthorByIdAction->run($data->authorId);

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

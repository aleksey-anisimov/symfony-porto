<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\DataProviders;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticlesActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\ArticleResource;

class ArticleDataProvider implements ItemDataProviderInterface, ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function __construct(
        private GetArticleActionInterface $getArticleAction,
        private GetArticlesActionInterface $getArticlesAction
    ) {
    }

    public function getItem(
        string $resourceClass,
        $id,
        string $operationName = null,
        array $context = []
    ): ?ArticleResource {
        $article = $this->getArticleAction->run($id);

        return $article ? ArticleResource::fromModel($article) : null;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        $articles = $this->getArticlesAction->run();

        return array_map( // TODO: use data transformer
            static function (ArticleInterface $article) {
                return ArticleResource::fromModel($article);
            },
            $articles
        );
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return ArticleResource::class === $resourceClass;
    }
}

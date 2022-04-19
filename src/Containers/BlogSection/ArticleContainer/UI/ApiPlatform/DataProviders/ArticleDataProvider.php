<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\DataProviders;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticlesActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\ArticleResource;
use App\Ship\Core\DataTransformers\DataTransformer;

class ArticleDataProvider implements ItemDataProviderInterface, ContextAwareCollectionDataProviderInterface,
                                     RestrictedDataProviderInterface
{
    public function __construct(
        private GetArticleActionInterface $getArticleAction,
        private GetArticlesActionInterface $getArticlesAction,
        private DataTransformer $dataTransformer
    ) {
    }

    public function getItem(
        string $resourceClass,
        $id,
        string $operationName = null,
        array $context = []
    ): ?ArticleResource {
        $article = $this->getArticleAction->run($id);

        return $article ? $this->dataTransformer->modelToResource($article, ArticleResource::class) : null;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        $articles = $this->getArticlesAction->run();

        return array_map(
            function (Article $article) {
                return $this->dataTransformer->modelToResource($article, ArticleResource::class);
            },
            $articles
        );
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return ArticleResource::class === $resourceClass;
    }
}

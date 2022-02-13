<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Containers\BlogSection\ArticleContainer\Models\Article as ArticleModel;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Requests\ArticleRequest;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Responses\ArticleResponse;

#[ApiResource(
    shortName: 'article',
    input: ArticleRequest::class,
    output: ArticleResponse::class,
    routePrefix: '/api-platform/blog'
)]
class ArticleResource
{
    public ?string $id = null;

    public ?string $title = null;

    public ?string $text = null;

    public ?string $authorId = null;

    public static function fromModel(ArticleModel $articleModel): self
    {
        $article = new self();
        $article->id = $articleModel->getId();
        $article->title = $articleModel->getTitle();
        $article->text = $articleModel->getText();
        $article->authorId = $articleModel->getAuthor()?->getId();

        return $article;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Containers\BlogSection\ArticleContainer\Models\Article as ArticleModel;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Requests\ArticleRequest;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Responses\ArticleResponse;
use Symfony\Component\Uid\Uuid;

#[ApiResource(
    input: ArticleRequest::class,
    output: ArticleResponse::class
)]
class ArticleResource
{
    public ?Uuid $id = null;

    public ?string $title = null;

    public ?string $text = null;

    public ?Uuid $authorId = null;

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
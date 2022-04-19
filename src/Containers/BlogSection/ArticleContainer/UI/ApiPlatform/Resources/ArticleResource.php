<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Requests\CreateArticleRequest;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Responses\ArticleResponse;
use App\Ship\Parents\Resources\AbstractResource;

#[ApiResource(
    shortName: 'article',
    input: CreateArticleRequest::class,
    output: ArticleResponse::class,
    routePrefix: '/api-platform/blog'
)]
class ArticleResource extends AbstractResource
{
    public ?string $id = null;

    public ?string $title = null;

    public ?string $text = null;

    public ?AuthorResource $author = null;
}
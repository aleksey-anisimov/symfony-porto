<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Responses;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Ship\Parents\Responses\AbstractResponse;

class ArticleResponse extends AbstractResponse
{
    public ?string $id = null;

    public ?string $title = null;

    public ?string $text = null;

    public ?string $authorId = null;

    public static function fromModel(ArticleInterface $article): self
    {
        $articleResponse = new self();
        $articleResponse->id = $article->getId();
        $articleResponse->title = $article->getTitle();
        $articleResponse->text = $article->getText();
        $articleResponse->authorId = $article->getAuthor()->getId();

        return $articleResponse;
    }
}

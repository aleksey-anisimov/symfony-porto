<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class CommentValue extends AbstractValue
{
    public function __construct(private string $text, private string $authorId, private string $articleId)
    {
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorId(): string
    {
        return $this->authorId;
    }

    public function getArticleId(): string
    {
        return $this->articleId;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Values;

use App\Ship\Parents\Values\AbstractValue;

class CreateArticleValue extends AbstractValue
{
    public function __construct(private string $title, private string $text, private string $authorId)
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthorId(): string
    {
        return $this->authorId;
    }
}

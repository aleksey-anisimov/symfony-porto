<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Values;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use App\Ship\Parents\Values\AbstractValue;

class CommentValue extends AbstractValue
{
    public ?string $text = null;

    public ?AuthorInterface $author = null;

    public ?ArticleInterface $article = null;
}
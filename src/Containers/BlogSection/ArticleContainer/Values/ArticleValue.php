<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Values;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Values\AbstractValue;

class ArticleValue extends AbstractValue
{
    public ?string $title = null;

    public ?string $text = null;

    public ?AuthorInterface $author = null;
}

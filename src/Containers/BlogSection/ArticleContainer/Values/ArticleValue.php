<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Values;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Requests\AbstractRequest;

class ArticleValue extends AbstractRequest
{
    public ?string $title = null;

    public ?string $text = null;

    public ?AuthorInterface $author = null;
}

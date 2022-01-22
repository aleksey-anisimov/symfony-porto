<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Responses;

use App\Ship\Parents\Responses\AbstractResponse;

class ArticleResponse extends AbstractResponse
{
    public ?string $id = null;

    public ?string $title = null;

    public ?string $text = null;

    public ?string $authorId = null;
}

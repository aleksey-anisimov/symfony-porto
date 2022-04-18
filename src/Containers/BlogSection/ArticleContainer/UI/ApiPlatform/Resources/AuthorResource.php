<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources;

use App\Ship\Parents\Resources\AbstractResource;

class AuthorResource extends AbstractResource
{
    public ?string $id = null;

    public ?string $firstname = null;
}
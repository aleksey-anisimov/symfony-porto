<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\ArticleContainer\Values\AuthorValue;

interface CreateOrUpdateAuthorActionInterface
{
    public function run(AuthorValue $authorValue): AuthorInterface;
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Actions\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Author;
use App\Containers\BlogSection\CommentContainer\Values\AuthorValue;

interface CreateOrUpdateAuthorActionInterface
{
    public function run(AuthorValue $authorValue): Author;
}
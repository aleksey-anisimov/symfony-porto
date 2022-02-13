<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;

interface SaveAuthorTaskInterface
{
    public function run(AuthorInterface $author): void;
}
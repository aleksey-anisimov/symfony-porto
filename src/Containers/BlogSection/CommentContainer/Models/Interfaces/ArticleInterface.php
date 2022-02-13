<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface ArticleInterface
{
    public function getId(): Uuid;
}
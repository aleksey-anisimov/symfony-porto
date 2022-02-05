<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use Symfony\Component\Uid\Uuid;

interface GetArticleActionInterface
{
    public function run(Uuid $id): ?ArticleInterface;
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use Symfony\Component\Uid\Uuid;

interface InternalClientInterface
{
    public function getUserById(Uuid $id): AuthorInterface;
}
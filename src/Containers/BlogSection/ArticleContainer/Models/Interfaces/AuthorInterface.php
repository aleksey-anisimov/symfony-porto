<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface AuthorInterface
{
    public function getId(): Uuid;

    public function getFirstname(): string;
}
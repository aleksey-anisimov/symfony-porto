<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models\Interfaces;

use Symfony\Component\Uid\Uuid;

interface CommentInterface
{
    public function getId(): Uuid;

    public function getText(): string;

    public function setText(string $text): CommentInterface;

    public function getAuthor(): AuthorInterface;

    public function getArticle(): ArticleInterface;
}
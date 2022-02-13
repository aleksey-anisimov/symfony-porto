<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models\Interfaces;

interface CommentInterface
{
    public function getId(): string;

    public function getText(): string;

    public function setText(string $text): CommentInterface;

    public function getAuthor(): AuthorInterface;

    public function getArticle(): ArticleInterface;
}
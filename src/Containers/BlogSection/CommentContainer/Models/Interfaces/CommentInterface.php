<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models\Interfaces;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use Symfony\Component\Uid\Uuid;

interface CommentInterface
{
    public function getId(): Uuid;

    public function getText(): string;

    public function setText(string $text): CommentInterface;

    public function getAuthor(): UserInterface;

    public function setAuthor(UserInterface $author): CommentInterface;

    public function getArticle(): ArticleInterface;

    public function setArticle(ArticleInterface $article): CommentInterface;
}
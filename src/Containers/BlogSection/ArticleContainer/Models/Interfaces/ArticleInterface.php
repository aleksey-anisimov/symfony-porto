<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models\Interfaces;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

interface ArticleInterface
{
    public function getId(): Uuid;

    public function getTitle(): string;

    public function setTitle(string $title): ArticleInterface;

    public function getText(): string;

    public function setText(string $text): ArticleInterface;

    public function getComments(): Collection;

    public function addComment(CommentInterface $comment): ArticleInterface;

    public function removeComment(CommentInterface $comment): ArticleInterface;

    public function getAuthor(): AuthorInterface;

    public function setAuthor(AuthorInterface $author): ArticleInterface;

    public function isDisabled(): bool;

    public function setDisabled(bool $disabled): ArticleInterface;
}
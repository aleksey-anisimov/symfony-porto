<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models\Interfaces;

interface ArticleInterface
{
    public function getId(): string;

    public function getTitle(): string;

    public function changeTitle(string $title): ArticleInterface;

    public function getText(): string;

    public function changeText(string $text): ArticleInterface;

    public function getAuthor(): AuthorInterface;

    public function isDisabled(): bool;

    public function disable(): ArticleInterface;

    public function enable(): ArticleInterface;
}
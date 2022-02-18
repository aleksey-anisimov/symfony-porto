<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Models\AbstractModel;

class Article extends AbstractModel implements ArticleInterface
{
    private bool $disabled = false;

    public function __construct(
        private string $id,
        private ?string $title,
        private ?string $text,
        private AuthorInterface $author
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function changeTitle(string $title): ArticleInterface
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function changeText(string $text): ArticleInterface
    {
        $this->text = $text;

        return $this;
    }

    public function getAuthor(): AuthorInterface
    {
        return $this->author;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function disable(): ArticleInterface
    {
        $this->disabled = true;

        return $this;
    }

    public function enable(): ArticleInterface
    {
        $this->disabled = false;

        return $this;
    }
}
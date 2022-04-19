<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models;

use App\Ship\Parents\Models\AbstractModel;

class Article extends AbstractModel
{
    public function __construct(
        private string $id,
        private ?string $title,
        private ?string $text,
        private Author $author,
        private bool $disabled = false
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

    public function changeTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function changeText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function disable(): self
    {
        $this->disabled = true;

        return $this;
    }

    public function enable(): self
    {
        $this->disabled = false;

        return $this;
    }
}
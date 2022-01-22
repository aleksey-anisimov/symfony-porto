<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Article extends AbstractModel implements ArticleInterface
{
    private Uuid $id;

    private ?string $title = null;

    private ?string $text = null;

    private Collection $comments;

    private AuthorInterface $author;

    private bool $disabled = false;

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
        $this->comments = new ArrayCollection();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): ArticleInterface
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): ArticleInterface
    {
        $this->text = $text;

        return $this;
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(CommentInterface $comment): ArticleInterface
    {
        $this->comments->add($comment);

        return $this;
    }

    public function removeComment(CommentInterface $comment): ArticleInterface
    {
        $this->comments->remove($comment);

        return $this;
    }

    public function setAuthor(AuthorInterface $author): ArticleInterface
    {
        $this->author = $author;

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

    public function setDisabled(bool $disabled): ArticleInterface
    {
        $this->disabled = $disabled;

        return $this;
    }
}
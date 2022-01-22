<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Ship\Parents\Models\AbstractModel;
use Symfony\Component\Uid\Uuid;

class Comment extends AbstractModel implements CommentInterface
{
    private Uuid $id;

    private ?string $text = null;

    private UserInterface $author;

    private ArticleInterface $article;

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): CommentInterface
    {
        $this->text = $text;

        return $this;
    }

    public function setAuthor(UserInterface $author): CommentInterface
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor(): UserInterface
    {
        return $this->author;
    }

    public function setArticle(ArticleInterface $article): CommentInterface
    {
        $this->article = $article;

        return $this;
    }

    public function getArticle(): ArticleInterface
    {
        return $this->article;
    }
}
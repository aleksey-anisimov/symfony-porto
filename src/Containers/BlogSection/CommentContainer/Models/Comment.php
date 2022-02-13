<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_comment_container_comment')]
class Comment extends AbstractModel implements CommentInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    #[ORM\Column(type: 'string')]
    private string $text;

    #[ORM\ManyToOne(targetEntity: AuthorInterface::class)]
    #[ORM\JoinColumn(nullable: false)]
    private AuthorInterface $author;

    #[ORM\ManyToOne(targetEntity: ArticleInterface::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ArticleInterface $article;

    public function __construct(?string $id, string $text, AuthorInterface $author, ArticleInterface $article)
    {
        $this->id = UuidGenerator::uuidString($id);
        $this->text = $text;
        $this->author = $author;
        $this->article = $article;
    }

    public function getId(): string
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

    public function getAuthor(): AuthorInterface
    {
        return $this->author;
    }

    public function getArticle(): ArticleInterface
    {
        return $this->article;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Entities;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_article_container_article')]
class Article
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    #[ORM\Column(type: 'string')]
    private ?string $title = null;

    #[ORM\Column(type: 'text')]
    private ?string $text = null;

    #[ORM\ManyToOne(targetEntity: AuthorInterface::class)]
    #[ORM\JoinColumn(nullable: false)]
    private AuthorInterface $author;

    #[ORM\Column(type: 'boolean')]
    private bool $disabled = false;

    private function __construct()
    {
    }

    public static function createFromModel(ArticleInterface $article): self
    {
        $entity = new self();
        $entity->setId($article->getId());
        $entity->setFirstname($article->getFirstname());

        return $entity;
    }

    public function getId(): string
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
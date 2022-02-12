<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Models;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_article_container_article')]
class Article extends AbstractModel implements ArticleInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    #[ORM\Column(type: 'uuid', unique: true)]
    private Uuid $id;

    #[ORM\Column(type: 'string')]
    private ?string $title = null;

    #[ORM\Column(type: 'text')]
    private ?string $text = null;

    #[ORM\ManyToOne(targetEntity: AuthorInterface::class)]
    #[ORM\JoinColumn(nullable: false)]
    private AuthorInterface $author;

    #[ORM\Column(type: 'boolean')]
    private bool $disabled = false;

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
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
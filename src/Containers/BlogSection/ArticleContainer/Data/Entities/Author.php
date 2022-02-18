<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Entities;

use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_article_container_author')]
class Author
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $firstname;

    private function __construct()
    {
    }

    public static function createFromModel(AuthorInterface $author): self
    {
        $entity = new self();
        $entity->setId($author->getId());
        $entity->setFirstname($author->getFirstname());

        return $entity;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Data\Entities;

use App\Ship\Parents\Entities\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_article_container_author')]
class Author extends AbstractEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $firstname;

    public function __construct(?string $id = null)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
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
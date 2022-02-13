<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_comment_container_author')]
class Author extends AbstractModel implements AuthorInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    #[ORM\Column(type: 'uuid', unique: true)]
    private Uuid $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private string $firstname;

    public function __construct(?Uuid $id)
    {
        $this->id = $id ?: Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): AuthorInterface
    {
        $this->firstname = $firstname;

        return $this;
    }
}
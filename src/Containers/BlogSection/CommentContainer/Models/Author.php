<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;
use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_comment_container_author')]
class Author extends AbstractModel implements AuthorInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    #[ORM\Column(type: 'string', nullable: true)]
    private string $firstname;

    public function __construct(?string $id)
    {
        $this->id = UuidGenerator::uuidString($id);
    }

    public function getId(): string
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
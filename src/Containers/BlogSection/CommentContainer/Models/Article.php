<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Models;

use App\Containers\BlogSection\CommentContainer\Models\Interfaces\ArticleInterface;
use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'blog_section_comment_container_article')]
class Article extends AbstractModel implements ArticleInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    public function __construct(?string $id = null)
    {
        $this->id = UuidGenerator::uuidString($id);
    }

    public function getId(): string
    {
        return $this->id;
    }
}
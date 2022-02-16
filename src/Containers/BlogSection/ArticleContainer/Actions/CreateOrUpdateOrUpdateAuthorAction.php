<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateOrUpdateAuthorActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Containers\BlogSection\ArticleContainer\Values\AuthorValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateOrUpdateOrUpdateAuthorAction extends AbstractAction implements CreateOrUpdateAuthorActionInterface
{
    public function __construct(
        private GetAuthorByIdTaskInterface $getAuthorByIdTask,
        private SaveAuthorTaskInterface $saveAuthorTask,
    ) {
    }

    public function run(AuthorValue $authorValue): AuthorInterface
    {
        $author = $this->getAuthorByIdTask->run($authorValue->getId()) ?: new Author($authorValue->getId());
        $author->setFirstname($authorValue->getFirstname());

        $this->saveAuthorTask->run($author);

        return $author;
    }
}
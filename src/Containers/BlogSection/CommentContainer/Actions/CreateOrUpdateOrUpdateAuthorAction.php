<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Actions;

use App\Containers\BlogSection\CommentContainer\Actions\Interfaces\CreateOrUpdateAuthorActionInterface;
use App\Containers\BlogSection\CommentContainer\Models\Author;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\AuthorInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Containers\BlogSection\CommentContainer\Values\AuthorValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateOrUpdateOrUpdateAuthorAction extends AbstractAction implements CreateOrUpdateAuthorActionInterface
{
    public function __construct(
        private GetAuthorByIdTaskInterface $getAuthorByIdAction,
        private SaveAuthorTaskInterface $saveAuthorTask,
    ) {
    }

    public function run(AuthorValue $authorValue): AuthorInterface
    {
        $author = $this->getAuthorByIdAction->run($authorValue->id) ?: new Author($authorValue->id);
        $author->setFirstname($authorValue->firstname);

        $this->saveAuthorTask->run($author);

        return $author;
    }
}
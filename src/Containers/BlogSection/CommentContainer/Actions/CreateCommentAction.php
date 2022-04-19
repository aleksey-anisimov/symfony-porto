<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Actions;

use App\Containers\BlogSection\CommentContainer\Actions\Interfaces\CreateCommentActionInterface;
use App\Containers\BlogSection\CommentContainer\Models\Comment;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetArticleByIdTaskInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveCommentTaskInterface;
use App\Containers\BlogSection\CommentContainer\Values\CommentValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateCommentAction extends AbstractAction implements CreateCommentActionInterface
{
    public function __construct(
        private SaveCommentTaskInterface $saveCommentTask,
        private GetAuthorByIdTaskInterface $getAuthorByIdTask,
        private GetArticleByIdTaskInterface $getArticleByIdTask,
    ) {
    }

    public function run(CommentValue $commentValue): Comment
    {
        $comment = new Comment(
            null,
            $commentValue->getText(),
            $this->getAuthorByIdTask->run($commentValue->getAuthorId()),
            $this->getArticleByIdTask->run($commentValue->getArticleId()),
        );

        $this->saveCommentTask->run($comment);

        return $comment;
    }
}
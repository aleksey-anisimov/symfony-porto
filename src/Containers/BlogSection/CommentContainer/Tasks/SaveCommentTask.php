<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Tasks;

use App\Containers\BlogSection\CommentContainer\Data\Repositories\Interfaces\CommentRepositoryInterface;
use App\Containers\BlogSection\CommentContainer\Models\Comment;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveCommentTaskInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class SaveCommentTask extends AbstractTask implements SaveCommentTaskInterface
{
    public function __construct(private CommentRepositoryInterface $repository)
    {
    }

    public function run(Comment $comment): void
    {
        $this->repository->save($comment);
    }
}
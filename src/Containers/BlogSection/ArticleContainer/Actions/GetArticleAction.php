<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Ship\Parents\Actions\AbstractAction;
use Symfony\Component\Uid\Uuid;

class GetArticleAction extends AbstractAction implements GetArticleActionInterface
{
    public function run(Uuid $id): ?ArticleInterface
    {
        // TODO: Implement run() method.
    }
}
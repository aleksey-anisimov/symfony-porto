<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticlesActionInterface;
use App\Containers\BlogSection\ArticleContainer\Data\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Ship\Parents\Actions\AbstractAction;

class GetArticlesAction extends AbstractAction implements GetArticlesActionInterface
{
    public function __construct(private ArticleRepositoryInterface $repository)
    {
    }

    public function run(): array
    {
        return $this->repository->findList();
    }
}
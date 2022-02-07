<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Actions;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticlesActionInterface;
use App\Ship\Parents\Actions\AbstractAction;

class GetArticlesAction extends AbstractAction implements GetArticlesActionInterface
{
    public function run(): array
    {
        // TODO: Implement run() method.
    }
}
<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\CLI\Commands;

use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: self::NAME,
    description: 'Create article from cli',
)]
class AuthorCreateCommand extends Command // TODO: remove it. It be created for debug.
{
    public const NAME = 'app:author:create';

    public function __construct(
        private SaveAuthorTaskInterface $saveAuthorTask
    ) {
        parent::__construct(self::NAME);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $author = new Author();

        $this->saveAuthorTask->run($author);

        return Command::SUCCESS;
    }
}

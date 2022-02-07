<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\CLI\Commands;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetAuthorByIdActionInterface;
use App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\BlogSection\ArticleContainer\Values\ArticleValue;
use App\Containers\UserContainer\Actions\Interfaces\GetUserByIdActionInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: self::NAME,
    description: 'Create article from cli',
)]
class ArticleCreateCommand extends Command
{
    public const NAME = 'app:article:create';

    public function __construct(
        private CreateArticleActionInterface $createArticleAction,
        private GetAuthorByIdActionInterface $getAuthorByIdAction
    ) {
        parent::__construct(self::NAME);
    }

    protected function configure(): void
    {
        $this
            ->addOption('title', null, InputOption::VALUE_REQUIRED, 'Title')
            ->addOption('text', null, InputOption::VALUE_REQUIRED, 'Text')
            ->addOption('authorId', null, InputOption::VALUE_REQUIRED, 'Author id');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $articleValue = new ArticleValue();
        $articleValue->title = $input->getOption('title');
        $articleValue->text = $input->getOption('text');

        $authorId = $input->getOption('authorId');
        $articleValue->author = $this->getAuthorByIdAction->run($authorId);

        $this->createArticleAction->run($articleValue);

        return Command::SUCCESS;
    }
}

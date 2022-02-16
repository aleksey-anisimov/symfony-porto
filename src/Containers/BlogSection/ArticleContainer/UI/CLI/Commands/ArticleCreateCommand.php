<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\CLI\Commands;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Values\CreateArticleValue;
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
        private CreateArticleActionInterface $createArticleAction
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
        $articleValue = new CreateArticleValue(
            $input->getOption('title'),
            $input->getOption('text'),
            $input->getOption('authorId')
        );

        $this->createArticleAction->run($articleValue);

        return Command::SUCCESS;
    }
}

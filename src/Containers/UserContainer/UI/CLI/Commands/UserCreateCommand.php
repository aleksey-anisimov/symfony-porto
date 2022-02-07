<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\UI\CLI\Commands;

use App\Containers\UserContainer\Actions\RegisterUserAction;
use App\Containers\UserContainer\Values\UserValue;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: self::NAME,
    description: 'Create user from cli',
)]
class UserCreateCommand extends Command // TODO: remove it. It be created for debug.
{
    public const NAME = 'app:user:create';

    public function __construct(
        private RegisterUserAction $registerUserAction
    ) {
        parent::__construct(self::NAME);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $userValue = new UserValue();
        $userValue->email = $input->getOption('email');
        $userValue->password = $input->getOption('password');

        $this->registerUserAction->run($userValue);

        return Command::SUCCESS;
    }
}

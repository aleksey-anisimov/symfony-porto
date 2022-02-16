<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\UI\CLI\Commands;

use App\Containers\SecuritySection\RegistrationContainer\Actions\Interfaces\RegisterUserActionInterface;
use App\Containers\SecuritySection\RegistrationContainer\Values\UserValue;
use App\Ship\Core\Generators\UuidGenerator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: self::NAME,
    description: 'Create user from cli',
)]
class UserCreateCommand extends Command // TODO: remove it. It be created for debug.
{
    public const NAME = 'app:user:create';

    public function __construct(
        private RegisterUserActionInterface $registerUserAction
    ) {
        parent::__construct(self::NAME);
    }

    protected function configure(): void
    {
        $this
            ->addOption('email', null, InputOption::VALUE_REQUIRED, 'Email')
            ->addOption('password', null, InputOption::VALUE_REQUIRED, 'Password')
            ->addOption('firstname', null, InputOption::VALUE_REQUIRED, 'firstname');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $userValue = new UserValue(
            UuidGenerator::uuidString(null),
            $input->getOption('email'),
            $input->getOption('password'),
            $input->getOption('firstname'),
            ['ROLE_USER'],
        );

        $this->registerUserAction->run($userValue);

        return Command::SUCCESS;
    }
}

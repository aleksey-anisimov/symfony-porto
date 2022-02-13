<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Actions;

use App\Containers\UserContainer\Actions\Interfaces\GetUserByIdActionInterface;
use App\Containers\UserContainer\Data\Repositories\Interfaces\UserRepositoryInterface;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Ship\Parents\Tasks\AbstractTask;

class GetUserByIdAction extends AbstractTask implements GetUserByIdActionInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function run(string $id): ?UserInterface
    {
        return $this->userRepository->find($id);
    }
}
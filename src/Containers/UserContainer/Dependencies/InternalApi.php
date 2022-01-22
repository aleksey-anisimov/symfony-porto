<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies;

use App\Containers\UserContainer\Actions\Interfaces\GetUserByIdActionInterface;
use App\Containers\UserContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use Symfony\Component\Uid\Uuid;

class InternalApi implements InternalApiInterface
{
    private GetUserByIdActionInterface $getUserByIdAction;

    public function __construct(GetUserByIdActionInterface $getUserByIdAction)
    {
        $this->getUserByIdAction = $getUserByIdAction;
    }

    public function getUserById(Uuid $id): ?UserInterface
    {
        return $this->getUserByIdAction->run($id);
    }
}
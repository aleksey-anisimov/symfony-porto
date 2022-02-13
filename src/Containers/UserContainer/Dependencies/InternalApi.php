<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies;

use App\Containers\UserContainer\Actions\Interfaces\CreateUserActionInterface;
use App\Containers\UserContainer\Actions\Interfaces\GetUserByIdActionInterface;
use App\Containers\UserContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use App\Containers\UserContainer\Dependencies\Transformers\UserToPublicModelTransformer;
use App\Containers\UserContainer\Dependencies\Values\CreateUserValue;
use App\Containers\UserContainer\Values\UserValue;
use App\Ship\Parents\Dependencies\AbstractInternalApi;

class InternalApi extends AbstractInternalApi implements InternalApiInterface
{
    public function __construct(
        private GetUserByIdActionInterface $getUserByIdAction,
        private UserToPublicModelTransformer $transformer,
        private CreateUserActionInterface $createUserAction
    ) {
    }

    public function getUserById(string $id): ?UserPublic
    {
        $user = $this->getUserByIdAction->run($id);

        return $user ? $this->transformer->toPublicModel($user) : null;
    }

    public function createUser(CreateUserValue $createUserValue): bool
    {
        $userValue = new UserValue();
        $userValue->id = $createUserValue->id;
        $userValue->email = $createUserValue->email;
        $userValue->firstname = $createUserValue->firstname;

        return (bool)$this->createUserAction->run($userValue);
    }
}
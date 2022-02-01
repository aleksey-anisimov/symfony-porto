<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Dependencies;

use App\Containers\UserContainer\Actions\Interfaces\GetUserByIdActionInterface;
use App\Containers\UserContainer\Dependencies\Interfaces\InternalApiInterface;
use App\Containers\UserContainer\Dependencies\Models\UserPublic;
use App\Containers\UserContainer\Dependencies\Transformers\UserToPublicModelTransformer;
use App\Containers\UserContainer\Models\Interfaces\UserInterface;
use App\Ship\Parents\Dependencies\AbstractInternalApi;
use Symfony\Component\Uid\Uuid;

class InternalApi extends AbstractInternalApi implements InternalApiInterface
{
    public function __construct(
        private GetUserByIdActionInterface $getUserByIdAction,
        private UserToPublicModelTransformer $transformer
    ) {
        $this->getUserByIdAction = $getUserByIdAction;
    }

    public function getUserById(Uuid $id): ?UserPublic
    {
        $user = $this->getUserByIdAction->run($id);

        return $user ? $this->transformer->toPublicModel($user) : null;
    }
}
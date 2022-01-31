<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies;

use App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\AuthorInterface;
use App\Containers\UserContainer\Dependencies\Interfaces\InternalApiInterface as UserContainerApi;
use App\Ship\Parents\Dependencies\AbstractInternalClient;
use Symfony\Component\Uid\Uuid;

class InternalClient extends AbstractInternalClient implements InternalClientInterface
{
    private UserContainerApi $userServer;

    public function __construct(UserContainerApi $userServer)
    {
        $this->userServer = $userServer;
    }

    public function getUserById(Uuid $id): AuthorInterface
    {
        $user = $this->userServer->getUserById($id);

        if (!$user) {
            throw new \Error(); // TODO: create UserNotFoundException
        }

        return new Author($user->getId());
    }
}
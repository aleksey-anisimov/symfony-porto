<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies;

use App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces\InternalClientInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\UserContainer\Dependencies\Interfaces\InternalApiInterface as UserContainerApi;
use App\Ship\Parents\Dependencies\AbstractInternalClient;

class InternalClient extends AbstractInternalClient implements InternalClientInterface
{
    private UserContainerApi $userServer;

    public function __construct(UserContainerApi $userServer)
    {
        $this->userServer = $userServer;
    }

    public function getAuthorById(string $id): Author
    {
        $user = $this->userServer->getUserById($id);

        if (!$user) {
            throw new \Error(); // TODO: create UserNotFoundException
        }

        return new Author($user->getId());
    }
}
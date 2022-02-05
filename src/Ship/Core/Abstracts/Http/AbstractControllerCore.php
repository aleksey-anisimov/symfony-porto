<?php

namespace App\Ship\Core\Abstracts\Http;

use App\Ship\Core\Security\SecurityUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbstractControllerCore extends AbstractController
{
    protected function getCurrentUser(): SecurityUser
    {
        $user = $this->getUser();

        return new SecurityUser($user);
    }
}
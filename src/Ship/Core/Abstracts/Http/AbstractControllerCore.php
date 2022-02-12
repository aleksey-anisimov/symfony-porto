<?php

declare(strict_types=1);

namespace App\Ship\Core\Abstracts\Http;

use App\Ship\Core\Security\SecurityUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbstractControllerCore extends AbstractController
{
    protected function getCurrentUser(): SecurityUser
    {
        return $this->getUser();
    }
}
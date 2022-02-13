<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Transformers;

use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Model\SecurityUserPublic;
use App\Containers\SecuritySection\SecurityUserContainer\Models\Interfaces\SecurityUserInterface;

class SecurityUserToPublicModelTransformer
{
    public function toPublicModel(SecurityUserInterface $securityUser): SecurityUserPublic
    {
        $securityUserPublic = new SecurityUserPublic();
        $securityUserPublic->id = $securityUser->getId();
        $securityUserPublic->email = $securityUser->getEmail();
        $securityUserPublic->roles = $securityUser->getRoles();

        return $securityUserPublic;
    }
}
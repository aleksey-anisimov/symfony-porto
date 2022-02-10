<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class IdentityValue extends AbstractValue
{
    #[NotBlank]
    private Uuid $id;

    #[NotBlank]
    #[Email]
    private string $email;

    public function __construct(Uuid $id, string $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class IdentityValue extends AbstractValue
{
    #[NotBlank]
    private string $id;

    #[NotBlank]
    #[Email]
    private string $email;

    public function __construct(string $id, string $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\LoginContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class CredentialsValue extends AbstractValue
{
    #[NotBlank]
    #[Email]
    private string $email;

    #[NotBlank]
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

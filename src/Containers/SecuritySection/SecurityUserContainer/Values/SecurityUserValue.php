<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Values;

use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class SecurityUserValue extends AbstractValue
{
    private string $id;

    #[NotBlank]
    #[Email]
    private string $email;

    #[NotBlank]
    private string $password;

    public function __construct(?string $id, string $email, string $password)
    {
        $this->id = UuidGenerator::uuidString($id);
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;
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

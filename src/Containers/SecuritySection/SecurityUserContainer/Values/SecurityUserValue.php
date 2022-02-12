<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Values;

use App\Ship\Parents\Values\AbstractValue;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class SecurityUserValue extends AbstractValue
{
    private Uuid $id;

    #[NotBlank]
    #[Email]
    private string $email;

    #[NotBlank]
    private string $password;

    public function __construct(?Uuid $id, string $email, string $password)
    {
        $this->id = $id ?: Uuid::v4();
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): Uuid
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

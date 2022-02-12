<?php

declare(strict_types=1);

namespace App\Ship\Core\Abstracts\Validators;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\ValidatorBuilder as SymfonyValidatorBuilder;

class ValidatorBuilder extends SymfonyValidatorBuilder
{
    public function getValidator(): ValidatorInterface
    {
        $validator = parent::getValidator();

        return new Validator($validator);
    }
}
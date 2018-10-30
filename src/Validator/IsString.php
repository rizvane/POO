<?php

declare(strict_types=1);

namespace App\Validator;

class IsString implements Validator
{
    public function validate(string $value): void
    {
        if ((string)(int)$value === $value) {
            throw new \LogicException('Int provided');
        }
    }
}
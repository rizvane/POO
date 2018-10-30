<?php

declare(strict_types=1);

namespace App\Validator;

class HasMoreThanTwoCharacters implements Validator
{
    public function validate(string $value): void
    {
        if (strlen($value) <= 2) {
            throw new \LogicException('Value has less than 2 chars, please make it bigger');
        }
    }
}
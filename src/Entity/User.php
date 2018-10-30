<?php

declare(strict_types=1);

namespace App\Entity;

final class User
{
    private $id;

    private $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

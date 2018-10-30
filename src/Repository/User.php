<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User as UserEntity;

interface User
{
    public function find(string $id): UserEntity;

    public function create(string $name): UserEntity;
}
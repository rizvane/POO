<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User as UserEntity;
use App\Repository\User;
use App\Validator\Validator;

final class UserService
{
    private $validator;

    private $repository;

    public function __construct(Validator $validator, User $userRepository)
    {
        $this->validator = $validator;
        $this->repository = $userRepository;
    }

    public function find(string $value): UserEntity
    {
        $this->validator->validate($value);
        // if ($this->cache->has($value)) {
        //     return $this->cache->get($value);
        // }
        $user = $this->repository->find($value);
        // $this->cache->set($value, $user);

        return $user;
    }
}
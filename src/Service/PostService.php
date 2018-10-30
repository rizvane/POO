<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Post as PostEntity;
use App\Repository\Post;
use App\Validator\Validator;

final class PostService
{
    private $validator;

    private $repository;

    public function __construct(Validator $validator, Post $userRepository)
    {
        $this->validator = $validator;
        $this->repository = $userRepository;
    }

    public function find(string $value): PostEntity
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
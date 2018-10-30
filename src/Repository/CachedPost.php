<?php

namespace App\Repository;


use App\Entity\Post as PostEntity;
use Twig\Cache\CacheInterface;

final class CachedPost implements Post
{
    private $repository;

    private $cache;

    public function __construct(Post $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function find(string $id): PostEntity
    {
        if ($this->cache->has($id)){
            return $this->cache->get($id);
        }

        $user = $this->repository->find($id);
        $this->cache->set($id, $user);

        return $user;
    }

    public function create(string $name): PostEntity
    {
        $user = $this->repository->create($name);
        $this->cache->set($user->id(), $user);
    }
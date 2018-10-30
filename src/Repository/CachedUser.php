<?php
/**
 * Created by PhpStorm.
 * User: fchou
 * Date: 30/10/2018
 * Time: 11:33
 */

namespace App\Repository;


use App\Entity\User as UserEntity;
use Twig\Cache\CacheInterface;

final class CachedUser implements User
{
    private $repository;

    private $cache;

    public function __construct(User $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function find(string $id): UserEntity
    {
        if ($this->cache->has($id)){
            return $this->cache->get($id);
        }

        $user = $this->repository->find($id);
        $this->cache->set($id, $user);

        return $user;
    }

    public function create(string $name): UserEntity
    {
        $user = $this->repository->create($name);
        $this->cache->set($user->id(), $user);
    }
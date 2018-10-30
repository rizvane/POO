<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post as PostEntity;
use Ramsey\Uuid\Uuid;

final class InMemoryPost implements Post
{
    private $users = [];

    public function __construct()
    {
        $uuid = '69e7a80b-925d-4670-a264-912a67523f5a';
        $this->users[$uuid] = new UserEntity($uuid, 'demo');
    }

    public function find(string $id): PostEntity
    {
        if (!isset($this->users[$id])) {
            throw new \LogicException('Id does not exist');
        }

        return $this->users[$id];
    }

    public function create(string $name): PostEntity
    {
        return new UserEntity((Uuid::uuid4())->toString(), $name);
    }
}
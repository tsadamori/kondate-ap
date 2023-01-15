<?php

namespace App\Interfaces\User;

interface UserServiceInterface
{
    public function indexUsers(int $limit, int $offset): array;
    public function showUser(int $userId): array;
}

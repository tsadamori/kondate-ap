<?php

namespace App\Interfaces\User;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getUsers(int $limit, int $offset, array $where = null): Collection;
    public function getCount(): int;
    public function getUser(int $userId): User;
}
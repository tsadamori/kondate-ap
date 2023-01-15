<?php

namespace App\Repositories\User;

use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers(int $limit, int $offset, array $where = null): Collection
    {
        return User::when($where, function ($query) use ($where) {
            return $query->where($where);
        })
        ->limit($limit)
        ->offset($offset)
        ->get();
    }

    public function getCount(): int
    {
        return User::count();
    }

    public function getUser(int $userId): User
    {
        return User::findOrFail($userId);
    }
}

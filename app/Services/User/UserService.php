<?php

namespace App\Services\User;

use App\Interfaces\User\UserServiceInterface;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexUsers(?int $limit, ?int $offset): array
    {
        $limit = $limit ?? 10;
        $offset = $offset ?? 0;

        $users = $this->userRepository->getUsers($limit, $offset)->toArray();
        $count = $this->userRepository->getCount();

        return [
            'metadata' => [
                'limit' => $limit,
                'offset' => $offset,
                'count' => $count,
            ],
            'users' => $users,
        ];
    }

    public function showUser(int $userId): array
    {
        return $this->userRepository->getUser($userId)->toArray();
    }
}

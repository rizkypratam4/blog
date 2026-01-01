<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function findByEmail(string $login, string $field): ?User
    {
        return User::where($field, $login)->first();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    
}

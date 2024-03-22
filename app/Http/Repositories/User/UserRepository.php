<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getUser(): Collection
    {
        return User::with('roles')->get()->toBase();
    }

    public function create(array $params): User
    {
        $params['password'] = Hash::make($params['password']);
        return User::create($params);
    }

    public function findUserId(int $id): User
    {
        return User::where('id', $id)->first();
    }

    public function update(array $params, int $id)
    {
        return User::where('id', $id)->update($params);
    }

    public function delete(int $id)
    {
        return User::where('id', $id)->delete();
    }
}

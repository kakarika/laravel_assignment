<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getUser()
    {
        return User::with('roles')->get()->toBase();
    }

    public function create(array $params): User
    {
        return User::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);
    }

    public function getSingleUser($id)
    {
        return User::where('id', $id)->first();
    }

    public function update(array $params, $id)
    {
        return User::where('id', $id)->update([
            'name' => $params['name'],
            'email' => $params['email']
        ]);
    }

    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }
}

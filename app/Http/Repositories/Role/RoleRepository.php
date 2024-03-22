<?php

namespace App\Http\Repositories\Role;

use App\Models\User;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function all(): Collection
    {
        return Role::all();
    }

    public function findId(string $roleId): Role
    {
        return  Role::where('id', $roleId)->first();
    }
}

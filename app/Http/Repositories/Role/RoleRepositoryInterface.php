<?php

namespace App\Http\Repositories\Role;

interface RoleRepositoryInterface
{

    public function all();

    public function findId(string $roleId);
}

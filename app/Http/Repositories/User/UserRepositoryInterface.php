<?php

namespace App\Http\Repositories\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getUser();

    public function create(array $params): User;

    public function getSingleUser($id);

    public function update(array $params, $id);

    public function delete($id);
}

<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getUser(): Collection;

    public function create(array $params): User;

    public function findUserId(int $id): User;

    public function update(array $params, int $id);

    public function delete(int $id);
}

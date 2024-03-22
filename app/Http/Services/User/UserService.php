<?php

namespace App\Http\Services\User;

use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    private $userRepository;

    private $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(): Collection
    {
        return $this->userRepository->getUser();
    }

    public function store(array $params): User
    {
        $role = $this->roleRepository->findId($params['role_id']);

        $user = $this->userRepository->create($params);
        return $user->assignRole($role);
    }

    public function editPage(int $id): User
    {
        return $this->userRepository->findUserId($id);
    }

    public function update(array $params, int $id)
    {
        return $this->userRepository->update($params, $id);
    }

    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }
}

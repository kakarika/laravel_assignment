<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    private $roleRepository;

    public function __construct(UserService $userService, RoleRepositoryInterface $roleRepository)
    {
        $this->userService = $userService;
        $this->roleRepository = $roleRepository;
    }
    public function index()
    {
        $users = $this->userService->index();

        return response()->json([
            'status' => 200,
            'message' => 'User list',
            'data' => $users
        ]);
    }

    public function store(Request $request)
    {
        $user = $this->userService->store($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'user created',
            'data' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = $this->userService->update($request->all(), $id);
        return response()->json([
            'status' => 201,
            'message' => 'user updated',
            'data' => $user
        ]);
    }

    public function delete($id)
    {
        $this->userService->delete($id);

        return response()->json([
            'status' => 200,
            'message' => 'user deleted'
        ]);
    }
}

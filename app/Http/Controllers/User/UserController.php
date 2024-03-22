<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Role\RoleRepositoryInterface;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    private $userService;
    private $roleRepository;

    public function __construct(UserService $userService, RoleRepositoryInterface $roleRepository)
    {
        $this->userService = $userService;
        $this->roleRepository = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('user_list')) {
            return abort(401);
        }

        $users = $this->userService->index();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }

        $roles = $this->roleRepository->all();

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }

        $user = $this->userService->store($request->validated());

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Gate::allows('user_edit')) {
            return abort(401);
        }

        $user = $this->userService->editPage($id);
        // $user = User::where('id', $id)->first();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $this->userService->update($request->validated(), $id);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('user_delete')) {
            return abort(401);
        }
        $this->userService->delete($id);

        return redirect()->route('users.index');
    }
}

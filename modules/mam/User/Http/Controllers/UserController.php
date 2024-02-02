<?php

namespace mam\User\Http\Controllers;

use App\Http\Controllers\Controller;
use mam\Role\Repositories\RoleRepository;
use mam\User\Http\Requests\RoleAssignRequest;
use mam\User\Http\Requests\UserRequest;
use mam\User\Models\User;
use mam\User\Repositories\UserRepository;
use mam\User\Services\UserService;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->authorize('index',User::class);
        $users = $this->repository->getAllUsers();
        return view('User::index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('index',User::class);
        return view('User::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->authorize('index',User::class);
        $this->repository->storeUser($request->all());
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
//    public function show(int $id)
//    {
//        $user = $this->repository->findById($id);
//        return view('User::show',compact('user'));
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $this->authorize('index',User::class);
        $user = $this->repository->findById($id);
        return view('User::edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $this->authorize('index',User::class);
        $this->repository->updateUser($id,$request->all());
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->authorize('index',User::class);
        $this->repository->deleteUser($id);
        return to_route('users.index');
    }

    public function addRoleView($userId,RoleRepository $roleRepository)
    {
        $this->authorize('index',User::class);
        $roles = $roleRepository->getAllRoles();
        $user = $this->repository->findById($userId);
        $notAssignedRoles = $roles->diff($user->roles);
        return view('User::add-role',compact('roles','user','notAssignedRoles'));
    }

    public function assignRoleMethod(RoleAssignRequest $request,$userId,UserService $service)
    {
        $this->authorize('index',User::class);
        $user = $this->repository->findById($userId);
        $service->assignOperation($request->role,$user);
        alert()->success('انتساب مقام',"انتساب مقام به کاربر $user->name با موفقیت انجام شد");
        return to_route('users.index');
    }

    public function deleteAssignedRole($userId,$roleId,UserService $service)
    {
        $this->authorize('index',User::class);
        $user = $this->repository->findById($userId);
        $role = Role::findById($roleId);
        $service->removeAssignedRoleOperation($role->name,$user);
        alert()->success('حذف مقام',"مقام $role->name از کاربر $user->name سلب شد");
        return to_route('users.index');
    }
}

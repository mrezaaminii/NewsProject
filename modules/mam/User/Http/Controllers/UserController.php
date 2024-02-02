<?php

namespace mam\User\Http\Controllers;

use App\Http\Controllers\Controller;
use mam\Role\Repositories\RoleRepository;
use mam\User\Http\Requests\RoleAssignRequest;
use mam\User\Http\Requests\UserRequest;
use mam\User\Repositories\UserRepository;
use mam\User\Services\UserService;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->getAllUsers();
        return view('User::index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
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
        $user = $this->repository->findById($id);
        return view('User::edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $this->repository->updateUser($id,$request->all());
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->repository->deleteUser($id);
        return to_route('users.index');
    }

    public function addRoleView($userId,RoleRepository $roleRepository)
    {
        $roles = $roleRepository->getAllRoles();
        $user = $this->repository->findById($userId);
        return view('User::add-role',compact('roles','user'));
    }

    public function assignRoleMethod(RoleAssignRequest $request,$userId,UserService $service)
    {
        $user = $this->repository->findById($userId);
        $service->assignOperation($request->role,$user);
        alert()->success('انتساب مقام',"انتساب مقام به کاربر $user->name با موفقیت انجام شد");
        return to_route('users.index');
    }
}

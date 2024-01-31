<?php

namespace mam\Role\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mam\Role\Repositories\RoleRepository;
use mam\Role\Services\PermissionService;

class RoleController extends Controller
{
    protected $repository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->repository->getAllRoles();
        return view('Role::index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PermissionService $permissionService)
    {
        $permissions = $permissionService->getAllPermissions();
        return view('Role::create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->repository->storeRole($request->only('name','permissions'));
        return to_route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id,PermissionService $permissionService)
    {
        $permissions = $permissionService->getAllPermissions();
        $role = $this->repository->findById($id);
        return view('Role::edit',compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $this->repository->updateRole($id,$request->only('name','permissions'));
        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->repository->deleteRole($id);
        return to_route('roles.index');
    }
}
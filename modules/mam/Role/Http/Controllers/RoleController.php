<?php

namespace mam\Role\Http\Controllers;

use mam\Role\Http\Requests\RoleRequest;
use mam\Role\Models\Role;
use mam\Role\Repositories\RoleRepository;
use mam\Role\Services\PermissionService;
use mam\Share\Http\Controllers\Controller;

class RoleController extends Controller
{
    protected $repository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->repository = $roleRepository;
    }

    public function index()
    {
        $this->authorize('index',Role::class);
        $roles = $this->repository->getAllRoles();
        return view('Role::index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PermissionService $permissionService)
    {
        $this->authorize('index',Role::class);
        $permissions = $permissionService->getAllPermissions();
        return view('Role::create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('index',Role::class);
        $this->repository->storeRole($request->only('name','permissions'));
        alert()->success('ساخت مقام', 'مقام با موفقیت ساخته شد');
        return to_route('roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id,PermissionService $permissionService)
    {
        $this->authorize('index',Role::class);
        $permissions = $permissionService->getAllPermissions();
        $role = $this->repository->findById($id);
        return view('Role::edit',compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, int $id)
    {
        $this->authorize('index',Role::class);
        $this->repository->updateRole($id,$request->only('name','permissions'));
        alert()->success('ویرایش مقام', 'مقام با موفقیت ویرایش شد');
        return to_route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->authorize('index',Role::class);
        $this->repository->deleteRole($id);
        alert()->success('حذف مقام', 'مقام با موفقیت حذف شد');
        return to_route('roles.index');
    }
}

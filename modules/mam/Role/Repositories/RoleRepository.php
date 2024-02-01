<?php

namespace mam\Role\Repositories;

use mam\Home\Repositories\BaseRepository;
use mam\Role\Contract\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function getAllRoles()
    {
        return $this->getAll()->with('permissions')->paginate(10);
    }

    public function storeRole(array $data)
    {
//        dd($data);
        return Role::create(['name' => $data['name']])->syncPermissions($data['permissions']);
    }

    public function updateRole(int $id, array $data)
    {
        $role = $this->findById($id);
        return $role->syncPermissions(collect($data['permissions']))->update(['name' => $data['name']]);
    }

    public function deleteRole(int $id)
    {
        return $this->findById($id)->delete();
    }
}

<?php

namespace mam\Role\Repositories;

use mam\Home\Repositories\BaseRepository;
use mam\Role\Contract\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function getAllRoles()
    {
        return $this->getAll()->with('permissions')->paginate(10);
    }

    public function storeRole(array $data)
    {
        return Role::create(['name' => $data['name']])->syncPermissions(collect($data['permissions']));
    }

    public function updateRole(int $id, array $data)
    {
        $role = $this->findById($id);
        $role->syncPermissions(collect($data['permissions']))->update(['name' => $data['name']]);
    }

    public function deleteRole(int $id)
    {
        return $this->findById($id)->delete();
    }
}

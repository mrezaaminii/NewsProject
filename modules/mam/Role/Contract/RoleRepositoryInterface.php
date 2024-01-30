<?php

namespace mam\Role\Contract;

interface RoleRepositoryInterface
{
    public function getAllRoles();
    public function storeRole(array $data);
    public function updateRole(int $id,array $data);
    public function deleteRole(int $id);
}

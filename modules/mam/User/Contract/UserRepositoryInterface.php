<?php

namespace mam\User\Contract;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function storeUser(array $data);
    public function showUser(int $id);
    public function updateUser(int $id,array $data);
    public function deleteUser(int $id);
    public function updateProfile($request,$modelInstance);
}

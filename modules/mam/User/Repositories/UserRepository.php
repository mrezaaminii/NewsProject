<?php

namespace mam\User\Repositories;

use Illuminate\Database\Eloquent\Model;
use mam\Home\Repositories\BaseRepository;
use mam\User\Contract\UserRepositoryInterface;
use mam\User\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
  public function __construct(User $user)
  {
      parent::__construct($user);
  }

    public function getAllUsers()
    {
        return $this->getAll();
    }

    public function createUser()
    {
//        return view();
    }

    public function storeUser(array $data)
    {
        return $this->storeRecord($data);
    }

    public function showUser(int $id)
    {
        return $this->findById($id);
    }
    public function editUser(int $id)
    {
        //
    }

    public function updateUser(int $id, array $data)
    {
        return $this->updateRecord($id,$data);
    }

    public function deleteUser(int $id)
    {
        return $this->deleteRecord($id);
    }
}

<?php

namespace mam\User\Repositories\Home;

use Illuminate\Database\Eloquent\Model;
use mam\Home\Repositories\BaseRepository;
use mam\Role\Models\Permission;
use mam\User\Contract\Home\UserRepositoryInterface;
use mam\User\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getAllAuthors()
    {
        return User::query()->permission(Permission::PERMISSION_AUTHORS);
    }
}

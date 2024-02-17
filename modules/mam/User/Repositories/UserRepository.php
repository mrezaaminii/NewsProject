<?php

namespace mam\User\Repositories;

use JetBrains\PhpStorm\ArrayShape;
use mam\Home\Repositories\BaseRepository;
use mam\Share\Services\ShareService;
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
        return $this->getAll()->where('id', '!=', auth()->id())->paginate(10);
    }

    public function storeUser(array $data)
    {
        return $this->storeRecord($data);
    }

    public function showUser(int $id)
    {
        return $this->findById($id);
    }

    public function updateUser(int $id, array $data)
    {
        if (!$data['password']) {
            $data['password'] = $this->findById($id)->password;
        }
        return $this->updateRecord($id, $data);
    }

    public function deleteUser(int $id)
    {
        return $this->deleteRecord($id);
    }

    #[ArrayShape([
        'name' => 'string',
        'email' => 'string',
        'password' => 'string|null',
        'linkedin' => 'string|null',
        'telegram' => 'string|null',
        'instagram' => 'string|null',
        'twitter' => 'string|null',
        'bio' => 'string|null',
        'imageName' => 'string|null',
        'imagePath' => 'string|null',
    ])] public function updateProfile($request,$modelInstance = null): array
    {
        if ($request->hasFile('image')){
        list($imageName, $imagePath) = ShareService::uploadImage($request, 'users',$modelInstance);
        }
        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'linkedin' => $request->linkedin,
            'telegram' => $request->telegram,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'bio' => $request->bio,
            'imageName' => $imageName ?? '',
            'imagePath' => $imagePath ?? '',
        ];
    }
}

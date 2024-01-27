<?php

namespace mam\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mam\User\Repositories\UserRepository;

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
    public function store(Request $request)
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
    public function update(Request $request, string $id)
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
}

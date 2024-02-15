<?php

namespace mam\User\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use mam\User\Repositories\Home\UserRepository;

class UserController extends Controller
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $authors = $this->repository->getAllAuthors()->paginate(12);
        return view('User::Home.authors',compact('authors'));
    }
}

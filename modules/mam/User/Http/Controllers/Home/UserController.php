<?php

namespace mam\User\Http\Controllers\Home;

use mam\Share\Http\Controllers\Controller;
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

    public function show(int $id)
    {
        $author = $this->repository->findById($id);
        $articles = $author->articles()->paginate(6);
        return view('User::Home.author',compact('author','articles'));
    }
}

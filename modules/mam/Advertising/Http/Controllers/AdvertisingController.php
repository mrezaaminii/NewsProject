<?php

namespace mam\Advertising\Http\Controllers;

use App\Http\Controllers\Controller;
use mam\Advertising\Http\Requests\AdvertisingRequest;
use mam\Advertising\Models\Advertising;
use mam\Advertising\Repositories\AdvertisingRepository;

class AdvertisingController extends Controller
{
    protected $repository;
    public function __construct(AdvertisingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $advertisings = $this->repository->getAllAdvertisements()->paginate(10);
        return view('Advs::index',compact('advertisings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Advs::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvertisingRequest $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvertisingRequest $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertising $advertising)
    {
        //
    }
}

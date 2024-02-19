<?php

namespace mam\Advertising\Http\Controllers;

use App\Http\Controllers\Controller;
use mam\Advertising\Http\Requests\AdvertisingRequest;
use mam\Advertising\Repositories\AdvertisingRepository;
use mam\Share\Repositories\ShareRepository;

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
        $this->repository->storeAdvertisement($request);
        ShareRepository::alertMessage('ذخیره سازی تبلیغات','تبلیغ با موفقیت ذخیره شد');
        return to_route('Advs::index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $advertising = $this->repository->findById($id);
        return view('Advs::edit',compact('advertising'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvertisingRequest $request, int $id)
    {
        $this->repository->updateAdvertisement($request,$id);
        ShareRepository::alertMessage('ویرایش تبلیغات','تبلیغ با موفقیت ویرایش شد');
        return to_route('Advs::index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->repository->deleteAdvertisement($id);
        ShareRepository::alertMessage('حذف تبلیغات','تبلیغ با موفقیت حذف شد');
        return to_route('Advs::index');
    }
}

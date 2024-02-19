<?php

namespace mam\Advertising\Services;

use mam\Share\Services\ShareService;

class AdvertisingService
{
    public function filterRequest($request,$modelInstance = null)
    {
        if ($request->hasFile('image')){
            list($imageName, $imagePath) = ShareService::uploadImage($request, 'advertising',$modelInstance);
        }
        return [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'link' => $request->link,
            'location' => $request->location,
            'imageName' => $imageName ?? '',
            'imagePath' => $imagePath ?? ''
        ];
    }
}

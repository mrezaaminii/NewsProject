<?php

namespace mam\Advertising\Services;

use JetBrains\PhpStorm\ArrayShape;
use mam\Share\Services\ShareService;

class AdvertisingService
{
    #[ArrayShape([
        'user_id' => 'int',
        'title' => 'string',
        'link' => 'string',
        'location' => 'string',
        'imageName' => 'string|null',
        'imagePath' => 'string|null',
    ])]
    public function filterRequest($request, $modelInstance = null)
    {
        if ($request->hasFile('image')) {
            list($imageName, $imagePath) = ShareService::uploadImage($request, 'advertising', $modelInstance);
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

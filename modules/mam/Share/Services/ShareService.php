<?php

namespace mam\Share\Services;

use Illuminate\Support\Facades\Storage;

class ShareService
{
    public static function uploadImage($request, string $folderName, $modelInstance = null)
    {
        if ($modelInstance) {
            if ($modelInstance->imagePath && $modelInstance->imageName) {
                Storage::disk('public')->delete($modelInstance->imagePath);
                $modelInstance->imageName = null;
                $modelInstance->imagePath = null;
                self::uploadImage($request, $folderName);
            }
        }
        $image = self::check_if_image_is_sent($request);
        if (!$image) {
            throw \Exception("Image Not Found!");
        }
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        if (!Storage::exists('public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folderName)) {
            Storage::makeDirectory(DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folderName);
        }
        $imagePath = Storage::disk('public')->putFileAs('images' . DIRECTORY_SEPARATOR . $folderName, $image, $imageName);

        return [$imageName, $imagePath];
    }

    public static function check_if_image_is_sent($request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            return $request->image;
        }
        return null;
    }
}

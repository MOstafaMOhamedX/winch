<?php

namespace App\Functions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Upload
{
    public static function UploadFile($file, $path)
    {
        if (in_array($file->getClientMimeType(), ['image/jpeg', 'image/jpg', 'image/webp', 'image/gif', 'image/png'])) {
            $name = time().'_'.rand(1000, 10000).'.webp';
            $imgFile = Image::make($file->getRealPath())->encode('webp')->fit(1024)->stream();
        } else {
            $name = time().'_'.rand(1000, 10000).'.'.$file->extension();
            $imgFile = File::get($file);
        }
        $path = $path.'/'.$name;
        Storage::disk('public')->put($path, $imgFile);

        return '/storage/'.$path;
    }

    public static function UploadFiles($files, $path)
    {
        $filesName = [];
        foreach ($files as $file) {
            $filesName[] = self::UploadFile($file, $path);
        }

        return $filesName;
    }

    public static function deleteImage($path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

    public static function deleteImages($paths = [])
    {
        foreach ($paths as $path) {
            self::deleteImage($path);
        }
    }
}

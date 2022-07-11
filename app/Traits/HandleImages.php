<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait HandleImages
{
    protected $imageDefault = 'default.png';
    protected $path = 'images/';

    public function verifyImage($request)
    {
        return $request->hasFile('image');
    }

    public function saveImage($request)
    {
        $image = $this->imageDefault;
        if ($this->verifyImage($request)) {
            $file = $request->file('image');
            $fileName = time() . $file->getClientOriginalName();
            $saveLocation = $this->path . $fileName;
            $image = Image::make($file);
            $image->fit(150, 150)->save($saveLocation);
            return $fileName;
        }
        return $image;
    }

    public function deleteImage($imageName)
    {
        $pathName = $this->path . $imageName;
        if (file_exists($pathName) && $imageName != $this->imageDefault) {
            unlink($pathName);
        }
    }

    public function updateImage($request, $currentImage)
    {

        if ($this->verifyImage($request)) {
            $this->deleteImage($currentImage);
            return $this->saveImage($request);
        }
        return $currentImage;
    }
}


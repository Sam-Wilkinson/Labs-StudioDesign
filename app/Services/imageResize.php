<?php

namespace App\Services;


use Image;
use Storage;
class ImageResize {
/*
* Saves and resizes an image
* @param $image the image sent by the form
* @param $folder the folder structure to store the images as a string in takes 'users', 'blogs','clients',*'products' and 'front'. see filesystems.php for more info
* @param $width width of the image resize
* @param $height height of the image resize
* @return string image name
*/

public function imageStore($image, $folder, $width, $height){
    $imageName = $image->store('', 'local' );
    $image->store('', $folder);

    $newImage = Image::make(Storage::disk($folder)->path($imageName))->resize($width, $height,function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
    });
    $newImage->save();
    return $imageName;
}
}
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
    if($folder == 'users'){
        $image->store('', $folder.'-thumb');
        $thumb = Image::make(Storage::disk($folder)->path($imageName))->resize(117, 117,function($constraint){
            $constraint->upsize();
        });
        $tiny = Image::make(Storage::disk($folder)->path($imageName))->resize(80, 80,function($constraint){
            $constraint->upsize();
        });
        $tiny->save();
        
    }
    $newImage->save();
    return $imageName;
}

}
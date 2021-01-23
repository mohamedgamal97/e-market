<?php


namespace App\Traits;

Trait ProductTrait
{
                        //img and distenation
    function savePhoto ($photo,$dist){
        $ext = $photo->getClientOriginalExtension();
        $file_name = time() .'.'. $ext; // example: 1122021.jpg

        $path = $dist;
        $photo->move($path,$file_name);
        return $file_name;
    }
}

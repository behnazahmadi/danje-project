<?php

namespace App\services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageService
{

    public function make($fileName,$directory,$inputName = null): string
    {
        $image = $fileName->getClientOriginalName();

        $safeRandomImageName = Str::random(7).$image.'.'.$fileName->extension();

        $fileName->move(public_path("assets/$directory"),$safeRandomImageName);

        return $safeRandomImageName;
    }

    /**
     * @param $directory
     * @param $fileName
     * @return bool
     */
    public function isFileExists($directory,$fileName): bool
    {
        if (File::exists(public_path("assets/$directory/".$fileName))){
           return $this->deleteFile($directory,$fileName);
        }

        return TRUE;
    }

    /**
     * @param $directory
     * @param $fileName
     * @return bool
     */
    public function deleteFile($directory,$fileName): bool
    {
       return File::delete(public_path("assets/$directory/$fileName"));
    }

}

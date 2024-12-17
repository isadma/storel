<?php


namespace App\Helpers;

use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class File
{
    private static function resize($img, string $type): mixed
    {
        if ($type == "slider"){
            $img->fit(900, 600);
        }
        elseif ($type == "category"){
            $img->fit(500, 500);
        }
        elseif ($type == "product_cover"){
            $img->fit(500, 500);
        }
        elseif ($type == "product_slider"){
            $img->fit(1200, 800);
        }
        return $img;
    }

    public static function storeImage($image, string $name, string $folder, string $type = "default") : string
    {
        $manager = new ImageManager(new Driver());
        $img = $manager->read($image);
        $img = self::resize($img, $type);
        $name = Str::slug($name) . '-' . uniqid() . '.' . $image->extension();
        $path = "images/$folder/$name";
        $img->save(base_path('public/'.$path));
        return $path;
    }

    public static function storeFile($file, string $folder_name, $file_name = null) : string
    {
        $destinationPath = "files/$folder_name/";
        if ($file_name){
            $filename = Str::slug($file_name) . "_" . date('YmdHis') . "_" . uniqid().'.'.$file->getClientOriginalExtension();
        }else{
            $filename = date('Y-m-d_His') . "_" . uniqid().'.'.$file->getClientOriginalExtension();
        }
        $file->move($destinationPath, $filename);
        return $destinationPath.$filename;
    }
}

<?php

namespace App\Http\Func;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class HandleImage
{
    public static function uploadImage($request, $dir, $model) : array
    {
        foreach ($request->file('image') as $image){
            $imageName = $image->getClientOriginalName();
            $image->storeAs($dir.$model->id, $imageName);
            if(Image::make(storage_path('app/'.$dir.$model->id.'/'.$imageName))->width() > 900){
                Image::make(storage_path('app/'.$dir.$model->id.'/'.$imageName))->resize(800, null)
                    ->save(storage_path('app/'.$dir.$model->id.'/'.$imageName));
            }
            $name[] = $imageName;
        }

        return $name;
    }

    public static function updateImage($request, $dir1, $dir2, $id, $model)
    {
        if($request->hasFile('image')){
            if(!is_dir($dir1.$id)){
                mkdir($dir1.$id, 0777, true);
            }

            HandleImage::uploadImage($request, $dir2, $model);
            $name = array_diff(scandir(public_path($model->image_url)), array('.', '..'));
            $model->image_url = $dir1.$model->id;
            $model->image_name = json_encode($name, JSON_UNESCAPED_UNICODE);
        }
    }

    public static function deleteImage($request, $dir, $id)
    {
        if($request->input('deleteImgName')){
            foreach ($request->input('deleteImgName') as $deleteImg){
                File::delete(storage_path($dir.$id.'/'.$deleteImg));
            }
        }
    }
}

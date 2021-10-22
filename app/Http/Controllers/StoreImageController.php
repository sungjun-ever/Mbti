<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StoreImageController extends Controller
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
}

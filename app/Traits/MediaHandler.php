<?php

namespace App\Traits;


use App\Models\Media;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait MediaHandler
{
    public function storeImage($request, $name, $media=null, $mediableId=null, $mediableType=null)
    {

        if($request->_method == "put"){
            if(File::exists(public_path($media->src))){
                File::delete(public_path($media->src));
            }
        }


        $file = $request->file($name);


        if (!$file) {
            return false;
        }
        $extension = $file->getClientOriginalExtension();
        $path = "media";
        $fileName = sprintf("%s.%s", md5(time()), $extension);
        $path = $file->storeAs($path, $fileName);

        $mediaId = $this->createMedia([
            'src' => $path,
            'id' => $mediableId,
            'type' => $mediableType,
        ]);

        return $mediaId;

    }

    public function createMedia($request){
        $media = Media::create([
            'src' => 'storage/'.$request['src']
        ]);

        return $media->id;
    }

}

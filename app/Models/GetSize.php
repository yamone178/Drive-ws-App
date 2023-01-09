<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GetSize extends Model
{
    use HasFactory;

    public static function getTotalSize(){

        $size =[];
        $fileSizes = File::where('user_id', Auth::id())
                    ->withTrashed()
                    ->get('size');

        foreach ($fileSizes as $key=>$fileSize){
            $size[$key] = $fileSize->size;

        }

        $sizes =  array_sum($size);

        return $sizes;
    }

    public static function changeMB($size){

        if ($size >= 1073741824)
        {
            $size = round($size / 1073741824) . ' GB';
        }elseif ($size >= 1048576)
        {
            $size= round($size / 1048576) . ' MB';
        }elseif ($size >= 1024){
            $size = round($size/1024)." kb";
        }else {
            $size = $size ."bytes";
        }
        return $size;
    }
}

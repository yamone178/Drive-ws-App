<?php

namespace App\Models;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class File extends Model
{
    use HasFactory;



    public function folders(){
        return $this->belongsTo(Folder::class);
    }
}

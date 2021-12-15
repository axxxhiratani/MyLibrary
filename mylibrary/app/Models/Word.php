<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Library;

class Word extends Model
{
    use HasFactory;

    protected $fillable =[
        "library_id",
        "name",
        "meaning",
        "note"
    ];

    //$word->library
    public function library(){
        return $this->belongsTo(Library::class);
    }

}

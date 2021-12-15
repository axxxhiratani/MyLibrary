<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Library;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable =[
        "library_id",
        "user_id",
    ];

    //favorite->library
    public function library(){
        return $this->belongsTo(Library::class);
    }

    //favorite->user
    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;
use App\Models\User;
use App\Models\Language;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "work_id",
        "language_id",
        "introduction"
    ];

    //profile->work
    public function work(){
        return $this->belongsTo(Work::class);
    }

    //profile->user
    public function user(){
        return $this->belongsTo(User::class);
    }


    //profile->language
    public function language(){
        return $this->belongsTo(Language::class);
    }

}

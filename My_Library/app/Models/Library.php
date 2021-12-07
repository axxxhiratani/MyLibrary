<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Word;
use App\models\Favorite;
use App\models\User;
use App\models\Language;



class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "language_id",
        "name",
        "view_permit",
    ];

    //$library->words
    public function words(){
        return $this->hasMany(Word::class);
    }

    //$library->favorites
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    //$library->user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //$library->language
    public function language(){
        return $this->belongsTo(Language::class);
    }

    //多対多
    public function userInfo(){
        return $this->belongsToMany(User::class)->withPivot("user");
    }


}

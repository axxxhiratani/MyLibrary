<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Word;
use App\models\Favorite;

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
}

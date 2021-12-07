<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Library;
use App\models\Profile;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image"
    ];

    

    //$language->libraries
    public function libraries()
    {
        return $this->hasMany(Library::class);
    }

    //$language->profiles
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

}

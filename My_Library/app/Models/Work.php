<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Profile;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];


    //$work->profiles
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

}

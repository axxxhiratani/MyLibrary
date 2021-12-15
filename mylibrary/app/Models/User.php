<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Library;
use App\Models\Favorite;
use App\Models\Profile;
use App\Models\Work;
use App\Models\Language;


class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'uuid',
        "work_id",
        "language_id",
        "introduction",
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    //$user->libraries
    public function libraries(){
        return $this->hasMany(Library::class);
    }

    //$user->favoriets
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    //$user->profile
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    //profile->work
    public function work(){
        return $this->belongsTo(Work::class);
    }
    //profile->language
    public function language(){
        return $this->belongsTo(Language::class);
    }


    //追加
    // public function getJWTIdentifier()
    // {
    //     return $this->getKey();
    // }


    // public function getJWTCustomClaims()
    // {
    //     return [];
    // }

}

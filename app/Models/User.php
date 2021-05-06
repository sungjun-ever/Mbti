<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mbtis()
    {
        return $this->hasMany('App\Models\Mbti');
    }

    public function frees()
    {
        return $this->hasMany('App\Models\Free');
    }

    public function suggests()
    {
        return $this->hasMany('App\Models\Suggest');
    }

    public function mbtiComments()
    {
        return $this->hasMany('App\Models\MbtiComment');
    }

    public function freeComments()
    {
        return $this->hasMany('App\Models\FreeComment');
    }
}

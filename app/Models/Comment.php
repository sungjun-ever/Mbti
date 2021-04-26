<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['story'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function mbti()
    {
        return $this->belongsTo('App\Models\Mbti');
    }

    public function replys()
    {
        return $this->hasMany('App\Models\Comment', 'comment_id', );
    }
}

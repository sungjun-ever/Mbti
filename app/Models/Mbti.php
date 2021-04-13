<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbti extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'story', 'user_id', 'user_name'];
}

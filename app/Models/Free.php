<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Free extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'story'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

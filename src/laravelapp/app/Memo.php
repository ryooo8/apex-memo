<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = ['memo', 'content', 'video'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = ['title', 'slug', 'body'];

    public function User(){
    	return $this->belongsTo('App\User');
    }

    public function komentars(){
        return $this->hasMany('App\komentar');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{

	protected $fillable = ['judul', 'tutorial_id'];

	public $timestamps = false;

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Tutorial(){
        return $this->belongsTo('App\Tutorial');
    }

}

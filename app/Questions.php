<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //
    protected $table = "questions";

    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function answers(){
        return $this->hasMany('App\Answers', 'question_id');
    }
    public function vote()
    {
        return $this->hasMany('App\Vote');
    }
}

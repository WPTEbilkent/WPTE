<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    //
    protected $table = "answers";
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->belongsTo('App\Questions');
    }
    public function comments()
    {
        return $this->hasMany('App\Comments', 'answer_id');
    }
    public function vote()
    {
        return $this->hasMany('App\Vote');
    }
}

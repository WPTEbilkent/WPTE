<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table = "comments";
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function answers(){
        return $this->belongsTo('App\Answers');
    }
}

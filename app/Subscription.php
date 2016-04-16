<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subscription extends Model
{
    protected $table = 'subscribe';



    public function user(){
        return $this->belongsTo('App\User');
    }
    public function subs(){
        return $this->hasMany('App\User', 'subscribed_id');
    }

}

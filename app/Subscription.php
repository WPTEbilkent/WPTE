<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subscription extends Model
{
    protected $table = 'subscribe';



    public function user(){
        return $this->belongsTo('App\User');
    }
    public function subscribers(){
        return $this->hasMany('App\User', 'subscriber_id');
    }
    public function subscribed(){
        return $this->hasMany('App\User', 'subscribed_id');
    }


}

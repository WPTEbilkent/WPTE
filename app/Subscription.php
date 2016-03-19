<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subscription extends Model
{
    protected $table = 'subscribe';



    public function user(){
        return $this->belongsTo('App\User');
    }

}
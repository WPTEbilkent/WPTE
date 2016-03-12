<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
   protected $table = 'tutorials';
   public $timestamps = false;

   public function user(){
      return $this->belongsTo('App\User');
   }
}

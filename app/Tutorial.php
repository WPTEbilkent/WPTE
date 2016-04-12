<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subscription;

class Tutorial extends Model
{
   protected $table = 'tutorials';
   public $timestamps = false;

   public function user(){
      return $this->belongsTo('App\User');
   }

   public function notifyAllSubs($id){
      $subs = Subscription::where('subscriber_id' , $id)->get()->subscribed_id;
      return $subs;

   }
}

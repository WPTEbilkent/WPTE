<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
    public $timestamps = false;

    public function event(){
        return $this->belongsTo('App\User');
    }

//    public function newEventCount(){
//        $newEventsCount = Events::where('status', '=', '0')->orderBy('insert_date')->count();
//        return $this->belongsTo('App\User');
//    }
}
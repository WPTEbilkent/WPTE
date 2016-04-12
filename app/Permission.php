<?php
/**
 * Created by PhpStorm.
 * User: omer
 * Date: 7.3.2016
 * Time: 04:02
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model{

    public function role(){

        return $this->belongsToMany(Role::class);
    }


}
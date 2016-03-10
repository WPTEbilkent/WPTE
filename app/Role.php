<?php
/**
 * Created by PhpStorm.
 * User: omer
 * Date: 7.3.2016
 * Time: 04:05
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function permissions()
    {

        return $this->belongsToMany(Permission::class);
    }

    public function assignRole(Permission $permission)
    {

        return $this->permissions()->save($permission);
    }

    //    $admin->assign($permis);
}
<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword, HasRoleAndPermission;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','phone','birth_date','login_date','type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function roles()
    {

        return $this->belongsToMany(Role::class);
    }

    // get string as role name like admin and check
    public function hasRole($role)
    {

        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        // if returns empty means that user has not role
        return !! $role->intersect($this->roles)->count();

//        foreach ($role as $r) {
//            if ($this->hasRole($r->name)) {
//                return true;
//            }
//        }
    }

    public function assignRole($role)
    {
        // if given is string
        if (is_string($role)) {
            return $this->roles()->save(
                Role::whereName($role)->firstOrfail()
            );
        }

        // given is collection
        return $this->roles()->save($role);
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Admin')
            {
                return true;
            }
        }

        return false;
    }
}

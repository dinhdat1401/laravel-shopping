<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }

    public function checkPermissionAccess($pemissionCheck)
    {
        // user login co quyen them, sua va xem menu
        // B1 lay duoc tat ca cac quyen user dang login vao he thong
        // B2 so sanh gia tri dua vao cua router hien tai xem co ton tai cac quyen ma minh lay dc hay ko

        $roles = auth()->user()->roles;
        foreach ($roles as $role)
        {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code',$pemissionCheck)){
                return true;
            }
        }
        return false;

    }

}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'profile',
        'image',
        'email',
        'password',
        'intro',
        'register_at',
        'last_login',
        'status',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
    
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function carts()
    {
        return $this->hasMany(carts::class,"user_id");
    
}
    
public function check(){
    dd(auth()->user());
}
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_users', 'user_id', 'role_id');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class, 'carts','user_id', 'pro_id');
    }
    public function checkPermissionsAccess($permissionsCheck)
    {
        $roles = auth()->user()->roles;
   
        foreach ($roles as $role) {
            
            $permissions = $role->permissions;
            
            if ($permissions->contains('key_code', $permissionsCheck)) {
                return true;
            }
            
        }
        return false;
    }
}

<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

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
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function isAdmin()
    {
        return $this->hasRole('admin') || $this->isSuperAdmin();
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super_admin');
    }

    public function isCustomer()
    {
        return $this->hasRole('customer');
    }

    private function hasRole($roleDescription)
    {
        return $this->roles()->where('description', $roleDescription)->exists();
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function customers()
    {
        return $this->belongsToMany('App\Customer');
    }

    public function hasCustomer(App\Customer $customer)
    {
        return $this->customers()->where('id', $customer->id)->exists();
    }
}

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
    protected $fillable = ['name', 'email', 'password', 'role'];

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
        return $this->hasRole('customer') || $this->isAdmin();
    }

    public function isUser()
    {
        return !$this->isAdmin() && !$this->isSuperAdmin() &&
            !$this->isCustomer();
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

    public function hasCustomer(Customer $customer)
    {
        return $this->customers()->where('id', $customer->id)->exists();
    }

    // ensure email is always saved as lowercase
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function getRoleAttribute()
    {
        if ($this->isSuperAdmin()) { return 'super_admin'; }
        if ($this->isAdmin()) { return 'admin'; }
        if ($this->isCustomer()) { return 'customer'; }
        if ($this->isUser()) { return 'user'; }
    }

    // update roles for the user
    public function setRoleAttribute($value)
    {
        $this->roles()->detach();
        switch ($value)
        {
            case 'super_admin':
                $this->roles()->attach(1);
                break;
            case 'admin':
                $this->roles()->attach(2);
                break;
            case 'customer':
                $this->roles()->attach(3);
                break;
        }
    }
}

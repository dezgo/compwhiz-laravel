<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * Explicitly specify the table name for this model.
	 *
	 * @var string
	 */
	protected $table = 'customers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
		'last_name',
		'business_name',
		'email',
		'address1',
		'address2',
		'suburb',
		'state',
		'postcode'
	];

	public function getDescriptionAttribute()
	{
		if ($this->business_name == '') {
			return $this->full_name;
		}
		else {
			return $this->business_name;
		}
	}

	public function getFullNameAttribute() {
		return $this->first_name.' '.$this->last_name;
	}

	public function getAddressAttribute() {
		return $this->address1.' '.(($this->address2 != '')?$this->address2.' ':'').$this->suburb.' '.$this->state.' '.$this->postcode;
	}

	public function getAddressMultiAttribute() {
		return (($this->business_name != '')?$this->business_name.'<br>':'').
			$this->address1.'<br>'.
			(($this->address2 != '')?$this->address2.'<br>':'').
			$this->suburb.' '.$this->state.' '.$this->postcode;
	}

	// intercept setting of email to see if we can match to an existing user
	// and ensure email is saved as lowercase
	public function setEmailAttribute($value) {
		$value = strtolower($value);
		$user = User::where('email', $value)->first();
		if (!is_null($user)) {
			$this->users()->attach($user);
		}
		$this->attributes['email'] = $value;
	}

	public function users()
	{
		return $this->belongsToMany('App\User');
	}
}

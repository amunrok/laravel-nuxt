<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
	use Notifiable;
	protected $fillable = [
		'name', 'email', 'password',
	];

	protected $hidden = [
		'password', 'remember_token',
	];

	public function getJWTIdentifier() {
		// return the primary key of the user - user id
		return $this->getKey();
	}

	public function getJWTCustomClaims() {
		// return a key value array, containing any custom claims to be added to JWT
		return [];
	}
}

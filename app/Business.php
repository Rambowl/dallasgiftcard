<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
	protected $guarded = [];

	//businesses can have more than one user or owner
    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function campaigns() {
    	return $this->hasMany(Campaign::class);
    }

    public function path() {
    	return "/businesses/{$this->id}";
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    //the campaign user
	public function business() {
		return $this->hasMany(Business::class);
	}
}

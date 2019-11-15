<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
	//the campaign owner
	public function owner() {
		return $this->belongsTo(User::class);
	}

	//the path of the campaigns
    public function path() {
    	return '/campaigns/{$this->id}';
    }
}

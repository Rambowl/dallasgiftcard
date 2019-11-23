<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Campaign extends Model
{
	//the campaign owner
	public function owner() {
		return $this->belongsTo(User::class);
	}

	public function getMyDateFormat($id) {
		//find the campaign using the id; change the updated_at to iso format and return it
		return $this::find($id)->updated_at->isoFormat('MM/DD/YYYY, hh:mm A');
	}

	//the path of the campaigns
    public function path() {
    	return '/campaigns/{$this->id}';
    }
}

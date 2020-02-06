<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Campaign extends Model
{
	protected $guarded = [];
	
	//the campaign user
	public function business() {
		return $this->belongsTo(Business::class);
	}

	public function getMyDateFormat($id) {
		//find the campaign using the id; change the updated_at to iso format and return it
		return $this::find($id)->updated_at->isoFormat('MM/DD/YYYY, hh:mm A');
	}

	public function updateTemplate($selection) {
		$this->update(['template' => $selection]);
	}

	//the path of the campaigns
    public function path() {
    	return "/campaigns/{$this->id}";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
{
    public function index() {
    	//if userId is set, request the id, otherwise abort
    	$userId = isset(request()->user()->id) ? request()->user()->id : abort(404);

    	$campaigns = Campaign::where('user_id', $userId)->get();

    	return view('campaigns.index', compact('campaigns'));	
    }
}

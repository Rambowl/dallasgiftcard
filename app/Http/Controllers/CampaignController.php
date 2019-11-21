<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
{
	//render a list of the resource.
    public function index() {
    	//if userId is set, request the id, otherwise abort
    	$userId = isset(request()->user()->id) ? request()->user()->id : abort(404);

    	$campaigns = Campaign::where('user_id', $userId)->get();

    	return view('campaigns.index', compact('campaigns'));	
    }

	//show a single resource.
    public function show($id) {
        $campaign = Campaign::find($id);

        return view('campaigns.show', compact('campaign'));
    }

    //shows a view to create a new resource.
    public function create() {
    	return view('campaigns.create');
    }

    //persist the new resource.
    public function store() {
        //validation
        request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $campaign = new Campaign();

        $campaign->title = request('title');
        $campaign->description = request('description');
        $campaign->type = 'Newsletter';
        $campaign->user_id = request()->user()->id;
        $campaign->save();

    	return redirect('/campaigns');
    }

    //show a view to edit the existing resource.
    public function edit($id) {
        $campaign = Campaign::find($id);

        return view('campaigns.edit', compact('campaign'));
    }

    //persist the edited resource.
   	public function update($id) {
        $campaign = Campaign::find($id);

        $campaign->title = request('title');
        $campaign->description = request('description');
        $campaign->save();

        return redirect('/campaigns/' . $campaign->id);
   	}

   	//delete the resource.
   	public function destroy() {

   	}
}

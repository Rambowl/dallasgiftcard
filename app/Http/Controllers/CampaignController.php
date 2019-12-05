<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Business;

class CampaignController extends Controller
{
	//render a list of the resource.
    public function index() {
    	//if userId is set, request the id, otherwise abort
        //$userID = auth()->check() ? auth()->user()->id : abort(404);
        $userID = auth()->user()->id;

        //get the businesses
        $businesses = Business::where('user_id', $userID)->get();

    	$campaigns = Campaign::where('user_id', $userID)->get();

    	return view('campaigns.index', compact('businesses'), compact('campaigns'));	
    }

	//show a single resource.; the argument passing is the campaign id
    public function show(Campaign $campaign) {
        return view('campaigns.show', compact('campaign'));
    }

    //shows a view to create a new resource.
    public function create() {
        //get the businesses
        $businesses = Business::where('user_id', auth()->user()->id)->get();

    	return view('campaigns.create', compact('businesses'));
    }

    //persist the new resource.
    public function store() {

        //dd(request()->all());
        //validation
        $this->validateRequest();

        //create the campaign db
        Campaign::create([
            'title' => request('title'),
            'description' => request('description'),
            'type' => request('type'),
            'user_id' => auth()->user()->id,
            'business_id' => request('businesses')
        ]);

    	return redirect('/campaigns');
    }

    //show a view to edit the existing resource.
    public function edit(Campaign $campaign) {
        //get the businesses
        //$businesses = Business::where('user_id', auth()->user()->id)->get();

        $businessName = Business::find($campaign->business_id)->business_name;

        return view('campaigns.edit', compact('campaign'), compact('businessName'));
    }

    //persist the edited resource.
   	public function update(Campaign $campaign) {
        $campaign->update($this->validateRequest());

        return redirect('/campaigns/' . $campaign->id);
   	}

   	//delete the resource.
   	public function destroy() {

   	}

    //method for validating campaign
    protected function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    }
}

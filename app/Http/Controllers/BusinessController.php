<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;

class BusinessController extends Controller
{
    public function index() {
    	$userID = isset(request()->user()->id) ? request()->user()->id : abort(404);
    	$businesses = Business::where('user_id', $userID)->get();

    	return view('businesses.index', compact('businesses'));
    }

    public function create() {
    	return view('businesses.create');
    }

    public function store() {
    	//validate
    	$this->validateRequest();

    	Business::create([
    		'business_name' => request('business_name'),
    		'address_1' => request('address_1'),
    		'address_2' => request('address_2'),
    		'city' => request('city'),
    		'state' => request('state'),
    		'zip_code' => request('zip_code'),
    		'phone_1' => request('phone_1'),
    		'phone_2' => request('phone_2'),
    		'website' => request('website'),
    		'user_id' => auth()->user()->id,
    	]);

    	return redirect('/businesses');
    }

    //validate before saving to database
    protected function validateRequest() {
    	return request()->validate([
    		'business_name' => 'required',
    		'address_1' => 'required',
    		'city' => 'required',
    		'state' => 'required',
    		'zip_code' => 'required'
    	]);
    }
}

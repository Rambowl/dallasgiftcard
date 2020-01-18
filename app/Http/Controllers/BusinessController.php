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

    /*public function show(Business $business) {
        return view('businesses.show', compact('business'));
    }*/

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
            'email' => request('email'),
    		'website' => request('website'),
            'description' => request('description'),
    		'user_id' => auth()->user()->id,
    	]);

    	return redirect('/businesses');
    }

    public function edit(Business $business) {
        return view('businesses.edit', compact('business'));
    }

    public function update(Business $business) {
        $business->update($this->validateRequest());

        return redirect('/businesses');
    }

    //image upload for logo
    public function logoCreate(Business $business) {
        return view('businesses.logoupload', compact('business'));
    }

    public function logoUpdate(Business $business) {
        $image = request()->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images').'/'.$business->id.'/',$imageName);

        //update logo in the database
        $business->update(['logo' => $imageName]);
        
        return response()->json(['success'=>$imageName]);
    }

    //validate before saving to database
    protected function validateRequest() {
    	return request()->validate([
    		'business_name' => 'required',
    		'address_1' => 'required',
            'address_2' => '',
    		'city' => 'required',
    		'state' => 'required',
    		'zip_code' => 'required',
            'phone_1' => '',
            'phone_2' => '',
            'email' => 'regex:/^.+@.+$/i',
            'website' => '',
            'description' => ''
    	]);
    }
}

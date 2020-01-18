<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function store() {
    	$this->validateRequest();

    	Contact::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'question' => request('question')
    	]);
    }

    protected function validateRequest() {
    	return request()->validate([
    		'name' => 'required',
    		'email' => 'email',
    		'question' => 'required',
    		'verification' => 'required|in:15'
    	]);
    }
}

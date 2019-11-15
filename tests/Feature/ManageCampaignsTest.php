<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageCampaignsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_must_login_to_access_campaigns() {
    	//sign in the user
        $this->signIn();

        $this->get('/campaigns')->assertStatus(200);
    }

    /** @test */
    public function guests_may_not_access_campaigns() {
    	$campaign = factory('App\Campaign')->create();

    	$this->get('/campaigns')->assertStatus(404);	
    }
}

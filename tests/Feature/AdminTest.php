<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AdminTest extends TestCase
{
	use RefreshDatabase;

    public function test_is_admin_middleware()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
        				 ->get('/admin/users');

        $response->assertStatus(404);
    }

    public function test_is_admin_middleware_as_admin()
    {
    	$user = factory(User::class)->create();

    	$user->update([
    		'is_admin' => true,
    	]);

    	$response = $this->actingAs($user)
    					 ->get('/admin/users');

    	$response->assertStatus(200)
    			 ->assertViewIs('admin.users.index');
    }
}

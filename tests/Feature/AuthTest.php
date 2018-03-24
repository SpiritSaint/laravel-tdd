<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class AuthTest extends TestCase
{
	use RefreshDatabase;

   	public function test_redirect_if_authenticated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/login');

        $response->assertRedirect('home');
    }
}

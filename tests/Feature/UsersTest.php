<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_index_route()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/users');

        $response->assertStatus(200);
    }

    public function test_users_show_route()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                        ->get('/users/'. $user->id);

        $response->assertStatus(200);
    }

    public function test_users_edit_route()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                        ->get('/users/'. $user->id . '/edit');

        $response->assertStatus(200);
    }

    public function test_users_update_route()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                        ->put('/users/'. $user->id);

        $response->assertStatus(200);
    }
}

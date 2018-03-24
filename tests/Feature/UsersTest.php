<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
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
}

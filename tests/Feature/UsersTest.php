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

        $response->assertStatus(200)
                 ->assertViewIs('users.index');
    }

    public function test_users_show_route()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                        ->get('/users/'. $user->id);

        $response->assertStatus(200)
                 ->assertViewIs('users.show');
    }

    public function test_users_edit_route()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                        ->get('/users/'. $user->id . '/edit');

        $response->assertStatus(200)
                 ->assertViewIs('users.edit');
    }

    public function test_users_update_route()
    {
        $user = factory(User::class)->create();

        $password = substr(md5(mt_rand()), 0, 6);

        $response = $this->actingAs($user)
                        ->put('/users/'. $user->id, [
                            'name' => $user->name,
                            'password' => $password,
                            'password_confirmation' => $password,
                        ]);

        $response->assertRedirect('/users/'. $user->id);
    }
}

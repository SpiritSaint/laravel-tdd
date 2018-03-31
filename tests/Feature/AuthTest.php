<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_admin_middleware()
    {
        $user = factory(User::class)->make();

        $password = substr(md5(mt_rand()), 0, 6);

        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect('home');

        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'is_admin' => true,
        ]);
    }

    public function test_register_admin_middleware_used()
    {
        $first_user = factory(User::class)->make();

        $first_password = substr(md5(mt_rand()), 0, 6);

        $first_response = $this->post('/register', [
            'name' => $first_user->name,
            'email' => $first_user->email,
            'password' => $first_password,
            'password_confirmation' => $first_password,
        ]);

        $first_response->assertRedirect('home');

        $this->assertDatabaseHas('users', [
            'email' => $first_user->email,
            'is_admin' => true,
        ]);

        $this->post('logout');

        $second_user = factory(User::class)->make();

        $second_password = substr(md5(mt_rand()), 0, 6);

        $second_response = $this->post('/register', [
            'name' => $second_user->name,
            'email' => $second_user->email,
            'password' => $second_password,
            'password_confirmation' => $second_password,
        ]);

        $second_response->assertRedirect('home');

        $this->assertDatabaseHas('users', [
            'email' => $second_user->email,
            'is_admin' => false,
        ]);
    }

    public function test_redirect_if_authenticated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/login');

        $response->assertRedirect('home');
    }

    public function test_reset_password_route()
    {
        $response = $this->get('/password/reset');

        $response->assertStatus(200);
    }

    public function test_register_route()
    {
        $user = factory(User::class)->make();

        $password = substr(md5(mt_rand()), 0, 6);

        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect('home');
    }

    public function test_home_route()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/home');

        $response->assertStatus(200);
    }

    public function test_reset_password_constructor()
    {
        $user = factory(User::class)->make();

        $response = $this->post('/password/reset', [
            'email' => $user->email,
        ]);

        $response->assertStatus(302);
    }
}

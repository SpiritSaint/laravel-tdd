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

    public function test_admin_show_user_route()
    {
        $user = factory(User::class)->create();

        $user->update([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($user)
                         ->get('/admin/users/'. $user->id);

        $response->assertStatus(200)
                 ->assertViewIs('admin.users.show');
    }

    public function test_admin_dashboard_route()
    {
        $user = factory(User::class)->create();

        $user->update([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($user)
                         ->get('/admin');

        $response->assertStatus(200)
                 ->assertViewIs('admin.index');
    }

    public function test_api_admin_show_user_route()
    {
        $user = factory(User::class)->create();

        $user->update([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($user, 'api')
                         ->get('/api/admin/users/'. $user->id);

        $response->assertStatus(200)
                ->assertJson([
                    'name' => $user->name,
            ]);
    }

    public function test_api_admin_upgrade_user_route()
    {
        $admin = factory(User::class)->create();

        $admin->update([
            'is_admin' => true,
        ]);

        $user = factory(User::class)->create();

        $response = $this->actingAs($admin, 'api')
                         ->get('/api/admin/users/'. $user->id .'/upgrade-to-admin');

        $response->assertStatus(200)
                ->assertJson([
                    'name' => $user->name,
            ]);
    }

    public function test_api_admin_downgrade_user_route()
    {
        $admin = factory(User::class)->create();

        $admin->update([
            'is_admin' => true,
        ]);

        $downgraded_admin = factory(User::class)->create(); 

        $downgraded_admin->update([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($admin, 'api')
                         ->get('/api/admin/users/'. $downgraded_admin->id .'/downgrade-to-user');

        $response->assertStatus(200)
                ->assertJson([
                    'name' => $downgraded_admin->name,
            ]);
    }
}

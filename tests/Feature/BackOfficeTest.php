<?php

namespace Tests\Feature;

use App\Models\SiteActivity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BackOfficeTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_page_views_are_recorded_once_per_session_and_page(): void
    {
        $this->get('/')->assertOk();
        $this->get('/')->assertOk();

        $this->assertSame(
            1,
            SiteActivity::where('event', 'page_view')->where('route', 'home')->count()
        );
    }

    public function test_successful_login_is_recorded_and_updates_last_login(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('dashboard', absolute: false));

        $this->assertDatabaseHas('site_activities', [
            'event' => 'login',
            'category' => 'security',
            'user_id' => $user->id,
        ]);
        $this->assertNotNull($user->refresh()->last_login_at);
    }

    public function test_admin_can_open_users_and_activity_screens(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->get(route('admin.users.index'))
            ->assertOk()
            ->assertSee('Comptes et accès');

        $this->actingAs($admin)
            ->get(route('admin.activities.index'))
            ->assertOk()
            ->assertSee('Tout ce qui se passe sur le site');
    }

    public function test_admin_can_promote_another_user(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $customer = User::factory()->create();

        $this->actingAs($admin)
            ->patch(route('admin.users.role', $customer), ['role' => 'admin'])
            ->assertSessionHasNoErrors();

        $this->assertTrue($customer->refresh()->is_admin);
        $this->assertDatabaseHas('site_activities', [
            'event' => 'user_updated',
            'subject_id' => $customer->id,
        ]);
    }

    public function test_admin_cannot_remove_their_own_admin_access(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)
            ->patch(route('admin.users.role', $admin), ['role' => 'customer'])
            ->assertSessionHasErrors('role');

        $this->assertTrue($admin->refresh()->is_admin);
    }
}

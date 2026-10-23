<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminUsersTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_view_user_management(): void
    {
        $response = $this->get('/admin/users');

        $response->assertRedirect(route('login', absolute: false));
    }

    public function test_authenticated_users_can_view_and_search_users(): void
    {
        $viewer = User::factory()->create(['name' => 'Farm Manager']);
        User::factory()->create(['name' => 'Harvest Coordinator', 'email' => 'harvest@example.com']);
        User::factory()->create(['name' => 'Poultry Lead', 'email' => 'poultry@example.com']);

        $response = $this->actingAs($viewer)->get('/admin/users?q=harvest');

        $response->assertOk();
        $response->assertSeeText('Users');
        $response->assertSeeText('harvest@example.com');
        $response->assertDontSeeText('Poultry Lead');
        $response->assertSeeText('Showing 1 of 1 matching users');
    }

    public function test_public_registration_is_closed(): void
    {
        $this->get('/register')->assertNotFound();

        $this->post('/register', [
            'name' => 'Stranger',
            'email' => 'stranger@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['email' => 'stranger@example.com']);
    }

    public function test_admin_can_add_a_user_who_can_then_sign_in(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)->post('/admin/users', [
            'name' => 'Musa Ibrahim',
            'email' => 'musa@example.com',
            'password' => 'harvest-2026',
            'password_confirmation' => 'harvest-2026',
        ])->assertRedirect(route('admin.users.index', absolute: false));

        $user = User::where('email', 'musa@example.com')->firstOrFail();
        $this->assertTrue(Hash::check('harvest-2026', $user->password));
        $this->assertNotNull($user->email_verified_at);
    }

    public function test_new_user_needs_a_unique_email_and_matching_password(): void
    {
        $admin = User::factory()->create(['email' => 'taken@example.com']);

        $this->actingAs($admin)->post('/admin/users', [
            'name' => 'Duplicate',
            'email' => 'taken@example.com',
            'password' => 'harvest-2026',
            'password_confirmation' => 'something-else',
        ])->assertSessionHasErrors(['email', 'password']);
    }

    public function test_admin_can_remove_another_user(): void
    {
        $admin = User::factory()->create();
        $other = User::factory()->create();

        $this->actingAs($admin)->delete('/admin/users/'.$other->id)
            ->assertRedirect(route('admin.users.index', absolute: false));

        $this->assertModelMissing($other);
    }

    public function test_admin_cannot_remove_themselves(): void
    {
        $admin = User::factory()->create();
        User::factory()->create();

        $this->actingAs($admin)->from('/admin/users')->delete('/admin/users/'.$admin->id)
            ->assertRedirect('/admin/users')
            ->assertSessionHas('error');

        $this->assertModelExists($admin);
    }

    public function test_last_account_cannot_delete_itself_from_profile(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->from('/profile')->delete('/profile', ['password' => 'password'])
            ->assertSessionHasErrorsIn('userDeletion', 'password');

        $this->assertModelExists($user);
        $this->assertAuthenticated();
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

        $response = $this->actingAs($viewer)->get('/admin/users?q=harvest');

        $response->assertOk();
        $response->assertSeeText('Users');
        $response->assertSeeText('harvest@example.com');
        $response->assertDontSeeText('Farm Manager');
        $response->assertSeeText('Showing 1 of 1 matching users');
    }
}

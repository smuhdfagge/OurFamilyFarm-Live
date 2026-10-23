<?php

namespace Tests\Feature;

use App\Models\ContactSubmission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    private function enquiry(array $overrides = []): ContactSubmission
    {
        return ContactSubmission::create($overrides + [
            'name' => 'Aisha Bello',
            'email' => 'aisha@example.com',
            'phone' => '+234 800 000 0000',
            'service' => 'Soil Analysis',
            'message' => 'Please send me a quote for soil testing.',
            'status' => 'new',
        ]);
    }

    public function test_guests_are_sent_to_login(): void
    {
        $this->get('/dashboard')->assertRedirect(route('login', absolute: false));
    }

    public function test_dashboard_shows_stats_trend_and_linked_enquiries(): void
    {
        $user = User::factory()->create();
        $enquiry = $this->enquiry();
        $this->enquiry(['name' => 'Old Contact', 'status' => 'resolved', 'created_at' => now()->subDays(30)]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk()
            ->assertSeeText('Dashboard overview')
            ->assertSeeText('Enquiries received')
            ->assertSeeText('Enquiry status')
            ->assertSee(route('admin.enquiries.show', $enquiry), false)
            ->assertSee('aria-current="page"', false);
    }

    public function test_dashboard_handles_an_empty_site(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/dashboard')
            ->assertOk()
            ->assertSeeText('No enquiries in the last two weeks.')
            ->assertSeeText('Your inbox is clear.');
    }

    public function test_sidebar_shows_new_enquiry_badge(): void
    {
        $this->enquiry();
        $this->enquiry(['name' => 'Second Person']);

        $this->actingAs(User::factory()->create())
            ->get('/admin/services')
            ->assertOk()
            ->assertSee('title="2 new"', false);
    }

    public function test_every_admin_page_renders(): void
    {
        $user = User::factory()->create();
        $enquiry = $this->enquiry();

        foreach ([
            '/dashboard', '/admin/enquiries', '/admin/enquiries/'.$enquiry->id, '/admin/users', '/admin/users/create',
            '/admin/services', '/admin/services/create', '/gallery-images', '/gallery-images/create',
            '/team-members', '/team-members/create', '/profile',
        ] as $url) {
            $this->actingAs($user)->get($url)->assertOk();
        }
    }

    public function test_enquiry_list_paginates_with_tailwind_links(): void
    {
        foreach (range(1, 16) as $i) {
            $this->enquiry(['name' => 'Person '.$i]);
        }

        $this->actingAs(User::factory()->create())
            ->get('/admin/enquiries')
            ->assertOk()
            ->assertSee('aria-label="Pagination Navigation"', false)
            ->assertDontSee('page-item', false);
    }
}

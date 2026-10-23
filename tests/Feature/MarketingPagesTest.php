<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MarketingPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_homepage_renders(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSeeText('Our Family Farm');
    }

    public function test_service_page_renders(): void
    {
        $response = $this->get('/services/crop-production');

        $response->assertOk();
        $response->assertSeeText('Crop Production');
    }

    public function test_contact_page_renders(): void
    {
        $response = $this->get('/contact');

        $response->assertOk();
        $response->assertSeeText('Head Office');
    }

}

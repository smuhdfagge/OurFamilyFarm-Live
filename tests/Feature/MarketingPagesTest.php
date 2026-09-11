<?php

namespace Tests\Feature;

use Tests\TestCase;

class MarketingPagesTest extends TestCase
{
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
        $response->assertSeeText('Get in touch');
    }

}

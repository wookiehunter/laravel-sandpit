<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageResponse()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText(('Laravel Sandpit'));
    }

    public function testContactPageResponse()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSeeText(('Contact Ussss'));
    }
}

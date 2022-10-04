<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactTest extends TestCase
{
    public function testContactPageResponse()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSeeText(('Contact Ussss'));
    }
}

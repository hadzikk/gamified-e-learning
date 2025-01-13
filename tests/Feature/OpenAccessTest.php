<?php

namespace Tests\Feature;

use Tests\TestCase;

class OpenAccessTest extends TestCase
{
    public function test_index_returns_login_view()
    {
        // Call the index method
        $response = $this->get('oa/account-security/login');

        // Assert the response
        $response->assertStatus(200); // Check if the status is 200 OK
        $response->assertViewIs('login'); // Check if the correct view is returned
    }
}
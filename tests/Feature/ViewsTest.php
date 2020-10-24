<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewsTest extends TestCase
{
    /** @test */
    public function test_can_see_welcome()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        
    }


}

<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
=======
     */
    public function test_the_application_returns_a_successful_response(): void
>>>>>>> e0e52116a513c334aa5bf04915070437adae30de
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

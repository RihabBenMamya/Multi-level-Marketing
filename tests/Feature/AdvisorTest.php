<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_calcul_of_personal_score()
    {
        $response = $this->get('personalScore/create');

        $response->assertStatus(200);
    }
}


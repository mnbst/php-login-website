<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatchTodoControllerTest extends TestCase
{
    /**@test */
    public function test_update_completed_to_true()
    {
        $response = $this->get('/ajax/done');

        $response->assertStatus(200);
    }
}

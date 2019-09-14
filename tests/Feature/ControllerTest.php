<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Todo;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;

class PatchTodoControllerTest extends TestCase
{
    /**@test */
    use RefreshDatabase;

    public function test_post_errors_without_title()
    {
        $response = $this->post('/ajax/postTodo', []);

        $response->assertStatus(200);
    }

    public function test_post_can_be_done()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->post('/ajax/postTodo', [
                'title' => 'test title',
                'text' => 'test text',
            ]);

        $response->assertStatus(200);

        $todo = Todo::all();

        $this->assertCount(1, $todo);
        $this->assertEquals('test title', $todo->first()->title);
    }

    public function test_post_cannot_be_successful_without_title()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->post('/ajax/postTodo', [
                'title' => '',
                'text' => 'test text',
            ]);

        $response->assertStatus(200);

        $todo = Todo::all();

        $this->assertCount(0, $todo);
    }
}

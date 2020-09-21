<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Goal;
use Illuminate\Support\Facades\Auth;

class GoalControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_goalを登録できる()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $condition = factory(Condition::class)->create();
        $schedule = factory(Schedule::class)->create();
        $category = factory(Category::class)->create();

        $this->post(route('goals.store'), [
            'what' => 'テスト目標１',
            'when' => '2030-01-01',
            'how_important' => '1',
            'how_urgent' => '1',
            'why1' => 'テスト理由１',
            'step1' => 'テストステップ１',
        ])
            ->assertStatus(302);
        $this->assertDatabaseHas('goals', ['what' => 'テスト目標１']);
    }
}

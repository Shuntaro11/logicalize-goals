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

        $this->post(route('goals.store'), [
            'what' => 'テスト目標１',
            'when' => '2030-01-01',
            'how_important' => '1',
            'how_urgent' => '1',
            'why1' => 'テスト理由１',
            'step1' => 'テストステップ１',
        ])
            ->assertStatus(200);
        $this->assertDatabaseHas('goals', ['what' => 'テスト目標１']);
    }


    public function test_「why」と「step」が無くてもgoalを登録できる()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('goals.store'), [
            'what' => 'テスト目標２',
            'when' => '2030-01-01',
            'how_important' => '1',
            'how_urgent' => '1',
        ])
            ->assertStatus(200);
        $this->assertDatabaseHas('goals', ['what' => 'テスト目標２']);
    }


    public function test_「how_important」が10より大きいとgoalを登録できない()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('goals.store'), [
            'what' => 'テスト目標３',
            'when' => '2030-01-01',
            'how_important' => '11',
            'how_urgent' => '1',
            'why1' => 'テスト理由３',
            'step1' => 'テストステップ３',
        ])
            ->assertStatus(302);
        $this->assertDatabaseMissing('goals', ['what' => 'テスト目標３']);
    }


    public function test_「how_important」が1より小さいとgoalを登録できない()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('goals.store'), [
            'what' => 'テスト目標４',
            'when' => '2030-01-01',
            'how_important' => '0',
            'how_urgent' => '1',
            'why1' => 'テスト理由４',
            'step1' => 'テストステップ４',
        ])
            ->assertStatus(302);
        $this->assertDatabaseMissing('goals', ['what' => 'テスト目標４']);
    }


    public function test_「how_urgent」が10より大きいとgoalを登録できない()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('goals.store'), [
            'what' => 'テスト目標５',
            'when' => '2030-01-01',
            'how_important' => '1',
            'how_urgent' => '11',
            'why1' => 'テスト理由５',
            'step1' => 'テストステップ５',
        ])
            ->assertStatus(302);
        $this->assertDatabaseMissing('goals', ['what' => 'テスト目標５']);
    }


    public function test_「how_urgent」が1より小さいとgoalを登録できない()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('goals.store'), [
            'what' => 'テスト目標６',
            'when' => '2030-01-01',
            'how_important' => '1',
            'how_urgent' => '0',
            'why1' => 'テスト理由６',
            'step1' => 'テストステップ６',
        ])
            ->assertStatus(302);
        $this->assertDatabaseMissing('goals', ['what' => 'テスト目標６']);
    }


    public function test_「what」が無いとgoalを登録できない()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('goals.store'), [
            'when' => '2030-01-01',
            'how_important' => '1',
            'how_urgent' => '1',
            'why1' => 'テスト理由７',
            'step1' => 'テストステップ７',
        ])
            ->assertStatus(302);
        $this->assertDatabaseMissing('goals', ['what' => 'テスト目標７']);
    }


    public function test_「when」が無いとgoalを登録できない()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->assertTrue(Auth::check());

        $this->post(route('goals.store'), [
            'what' => 'テスト目標８',
            'how_important' => '1',
            'how_urgent' => '1',
            'why1' => 'テスト理由８',
            'step1' => 'テストステップ８',
        ])
            ->assertStatus(302);
        $this->assertDatabaseMissing('goals', ['what' => 'テスト目標８']);
    }

}

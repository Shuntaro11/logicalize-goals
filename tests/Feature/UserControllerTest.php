<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */

    public function test_ユーザー新規登録()
    {
        
        $this->post(route('register'), [
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])
            ->assertStatus(302);
        $this->assertDatabaseHas('users', ['email' => 'user@example.com']);

    }

    public function test_ユーザーログイン()
    {
        
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get('/goals/index');

        // 認証されていることを確認
        $this->assertTrue(Auth::check());

        // goals.indexに遷移すると「目標一覧」が表示される
        $response->assertStatus(200)
            ->assertViewIs('goal.index')
            ->assertSee('目標一覧');

    }


    public function test_ユーザーログアウト()
    {
        $user = factory(User::class)->create();
    
        $this->actingAs($user);
    
        // 認証されていることを確認
        $this->assertTrue(Auth::check());
    
        // ログアウトを実行
        $response = $this->post('logout');
    
        // 認証されていない
        $this->assertFalse(Auth::check());
    
         // topページにリダイレクトする
        $response->assertRedirect('/');

    }

}

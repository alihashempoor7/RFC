<?php

namespace Http\Controllers\API\V01\Auth;

use App\Http\Controllers\API\V01\Auth\AuthController;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * register
     */

    public function test_new_user_register_validate()
    {
        $response = $this->postJson(route('register'), [
            'name' => "ali",
            'email' => "ali@gmail.com",
            'password' => "123456"
        ]);
        $response->assertStatus(201);
    }

    /**
     * user info
     */
    public function test_show_user_info()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->getJson(route('user'));
        $response->assertStatus(200);
    }


    /**
     * login test
     */
    public function test_user_login_validate()
    {
        $response = $this->postJson(route('login'));
        $response->assertStatus(422);
    }

    /**
     * logout test
     */
    public function test_user_logout_validate()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->postJson(route('logout'));
        $response->assertStatus(200);
    }


}

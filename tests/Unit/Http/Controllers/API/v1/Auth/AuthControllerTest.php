<?php

namespace Http\Controllers\API\v1\Auth;

use App\Http\Controllers\API\v1\Auth\AuthController;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class AuthControllerTest extends TestCase
{
    use RefreshDatabase;
    public function RegisterRolesAndPermissions(){
        $roleindatabase = \Spatie\Permission\Models\Role::where('name', config('permission.default_roles')[0]);
        if ($roleindatabase->count() < 1) {
            foreach (config('permission.default_roles') as $role) {
                \Spatie\Permission\Models\Role::create([
                    'name' => $role
                ]);
            }
        }

        $permissionindatabase = \Spatie\Permission\Models\Permission::where('name', config('permission.default_permissions')[0]);
        if ($permissionindatabase->count() < 1) {
            foreach (config('permission.default_permissions') as $permission) {
                \Spatie\Permission\Models\Permission::create([
                    'name' => $permission
                ]);
            }
        }
    }

    /**
     * register
     */

    public function test_new_user_register()
    {
        $this->RegisterRolesAndPermissions();
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

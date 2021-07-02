<?php

namespace Http\Controllers\API\v1\Channel;

use App\Channel;
use App\Http\Controllers\API\v1\Channel\ChannelController;
use App\User;
use Laravel\Sanctum\Sanctum;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class ChannelControllerTest extends TestCase
{
    /*
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
*/
   public function test_Index()
    {
        $response = $this->get(route('channel.index'));
        $response->assertStatus(200);
    }
/*
    public function test_create_channel()
    {
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);
       $this->RegisterRolesAndPermissions();
        $user->givePermissionTo('channel management');
        $response = $this->postJson(route('channel.create'), [
            'name' => "ali",
        ]);
        $response->assertStatus(201);
    }

    public function test_create_channel_validate()
    {
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);
        $this->RegisterRolesAndPermissions();
        $response = $this->postJson(route('channel.create'));
        $response->assertStatus(422);
    }

    public function test_edit_channel_validate()
    {
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);
        $this->RegisterRolesAndPermissions();
        $response = $this->Json('PUT', route('channel.edit'));
        $response->assertStatus(422);
    }

    public function test_edit_channel()
    {
        $channel = factory(Channel::class)->create([
            'name' => 'laravel'
        ]);
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);
        $this->RegisterRolesAndPermissions();
        $response = $this->Json('put', route('channel.edit'), [
            'id' => $channel->id,
            'name' => 'ali',
        ]);
        $channel_edit = Channel::find($channel->id);
        $response->assertStatus(200);
        $this->assertEquals('ali', $channel_edit->name);
    }

    public function test_delete_channel_validate()
    {
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);
        $this->RegisterRolesAndPermissions();
        $response = $this->Json('delete', route('channel.delete'));
        $response->assertStatus(422);
    }

    public function test_delete_channel()
    {
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);
        $this->RegisterRolesAndPermissions();

        $channel = factory(Channel::class)->create();
        $response = $this->Json('delete', route('channel.delete'), ['id'=>$channel->id]);
        $response->assertStatus(200);
    }*/
}

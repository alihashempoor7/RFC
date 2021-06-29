<?php

namespace Http\Controllers\API\v1\Channel;

use App\Channel;
use App\Http\Controllers\API\v1\Channel\ChannelController;
use Tests\TestCase;

class ChannelControllerTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get(route('channel.index'));
        $response->assertStatus(200);
    }

    public function test_create_channel()
    {
        $response = $this->postJson(route('channel.create'), [
            'name' => "ali",
        ]);
        $response->assertStatus(201);
    }

    public function test_create_channel_validate()
    {
        $response = $this->postJson(route('channel.create'));
        $response->assertStatus(422);
    }

    public function test_edit_channel_validate()
    {
        $response = $this->Json('PUT', route('channel.edit'));
        $response->assertStatus(422);
    }

    public function test_edit_channel()
    {
        $channel = factory(Channel::class)->create([
            'name' => 'laravel'
        ]);
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
        $response = $this->Json('delete', route('channel.delete'));
        $response->assertStatus(422);
    }

    public function test_delete_channel()
    {
        $channel = factory(Channel::class)->create();
        $response = $this->Json('delete', route('channel.delete'), ['id'=>$channel->id]);
        $response->assertStatus(200);
    }
}

<?php

namespace Http\Controllers\API\v1\Thread;

use App\Channel;
use App\Thread;
use App\User;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ThreadControllerTest extends TestCase
{

    public function test_thread_accessible()
    {
        $response = $this->get(route('thread.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_thread_show()
    {

        $thread = factory(Thread::class)->create();
        $response = $this->get(route('thread.show', [$thread->slug]));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_thread_store_validation()
    {
        $response = $this->postJson(route('thread.store'), []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_thread_store()
    {
        // $this->withoutExceptionHandling();

        Sanctum::actingAs(factory(User::class)->create());
        $response = $this->postJson(route('thread.store'), [
            'title' => 'ali',
            'content' => 'project',
            'channel_id' => factory(Channel::class)->create()->id
        ]);
        $response->assertStatus(Response::HTTP_CREATED);

    }

    public function test_thread_edit_validation()
    {
        //$this->withoutExceptionHandling();
        Sanctum::actingAs(factory(User::class)->create());
        $thread = factory(Thread::class)->create();
        $response = $this->putJson(route('thread.update', [$thread]), []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_thread_update()
    {
        // $this->withoutExceptionHandling();
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);

        $thread =factory(Thread::class)->create([
            'title' => 'ali',
            'content' => 'project',
            'channel_id' => factory(Channel::class)->create()->id,
            'user_id'=>$user->id
        ]);
        $response = $this->putJson(route('thread.update',[$thread]), [
            'title' => 'ali7',
            'content' => 'project',
            'channel_id' => factory(Channel::class)->create()->id
        ]);
        $thread->refresh();
        $this->assertSame('ali7',$thread->title);
        $response->assertStatus(Response::HTTP_OK);

    }

    public function test_thread_answer_update()
    {
         $this->withoutExceptionHandling();
       $user=factory(User::class)->create();
        Sanctum::actingAs($user);
        $thread =factory(Thread::class)->create([

            'user_id' => $user->id,
        ]);
        $response = $this->putJson(route('thread.update',[$thread]), [
           'best_answer_id'=>1,
        ]);
      //  $thread->refresh();
        //$this->assertSame(1,$thread->best_answer_id);
        $response->assertStatus(Response::HTTP_OK);

    }
    public function test_thread_delete()
    {
        //$this->withoutExceptionHandling();
        $user=factory(User::class)->create();
        Sanctum::actingAs($user);
        $thread =factory(Thread::class)->create([

            'user_id' => $user->id,
        ]);
        $response = $this->deleteJson(route('thread.destroy', [$thread]));
        $response->assertStatus(Response::HTTP_OK);
    }

}

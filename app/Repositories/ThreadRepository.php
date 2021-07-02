<?php


namespace App\Repositories;


use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThreadRepository
{
    public function create(Request $request): void
    {
        Thread::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'content' => $request->input('content'),
            'channel_id' => $request->input('channel_id'),
            'user_id' => auth()->user()->id
        ]);
    }
    public function update(Thread $thread,Request $request): void
    {
        if (!$request->has('best_answer_id')) {
            $thread->update([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'content' => $request->input('content'),
                'channel_id' => $request->input('channel_id'),]);
        }
        else{
            $thread->update([

                'best_answer_id' => $request->input('best_answer_id')]);

        }
    }

}

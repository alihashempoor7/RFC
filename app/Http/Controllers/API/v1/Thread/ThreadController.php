<?php

namespace App\Http\Controllers\API\v1\Thread;

use App\Http\Controllers\Controller;
use App\Repositories\ThreadRepository;
use App\Thread;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $threads = Thread::whereFlag(1)->latest()->get();
        return \response()->json($threads, Response::HTTP_OK);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'channel_id' => ['required']
        ]);

        resolve(ThreadRepository::class)->create($request);
        return \response()->json(
            ['massage' => 'thread created']
            , Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        $threads = Thread::whereSlug($slug)->first();
        return \response()->json($threads, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Thread $thread)
    {
        if (!$request->has('best_answer_id')) {
            $request->validate([
                'title' => ['required'],
                'content' => ['required'],
                'channel_id' => ['required']
            ]);
        } else {
            $request->validate([
                'best_answer_id' => ['required'],

            ]);
        }
        $user=auth()->user();
        if (Gate::forUser($user)->allows('update-thread',[$thread])) {
            resolve(ThreadRepository::class)->update($thread, $request);
            return \response()->json(
                ['massage' => 'thread updated']
                , Response::HTTP_OK);

        }
        return \response()->json(
            ['massage' => 'access denied']
            , Response::HTTP_FORBIDDEN);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Thread $thread)
    {
        $user=auth()->user();
        if (Gate::forUser($user)->allows('update-thread',[$thread])) {
            Thread::destroy($thread);
            return \response()->json(
                ['massage' => 'thread updated']
                , Response::HTTP_OK);
        }
        return \response()->json(
            ['massage' => 'access denied']
            , Response::HTTP_FORBIDDEN);
    }

    /**
     * @param Request $request
     */

}

<?php

namespace App\Http\Controllers\API\v1\Channel;

use App\Channel;
use App\Http\Controllers\Controller;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @method GET
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->Json(Channel::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\JsonResponse
     * @method POST
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        resolve(ChannelRepository::class)->create($request);

        return response()->json([
            "massage"=>"channel created"
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
       resolve(ChannelRepository::class)->update($request);

        return response()->json([
            "massage"=>"channel updated"
        ],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => ['required'],
        ]);
Channel::destroy($request->id);
        return response()->json([
            "massage"=>"channel deleted"
        ],Response::HTTP_OK);
    }

    /**
     * @param Request $request
     */



    /**
     * @param Request $request
     */

}

<?php


namespace App\Repositories;


use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelRepository
{
    /**
     * @param $name
     */
    public function create(Request $request): void
    {
        Channel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
    }
    public function update(Request $request): void
    {
        Channel::find($request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
    }
}

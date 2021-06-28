<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $fillable = [
        'user_id','thread_id'
    ];
    public function thread(){
        return $this->belongsTo(Thread::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

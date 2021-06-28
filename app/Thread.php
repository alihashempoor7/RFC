<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'title', 'slug','content','user_id','channel_id','answer_id','flag'
    ];
    public function channel(){
        return $this->belongsTo(Channel::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function answers(){
        return $this->hasMany(Answer::class);
    }
}

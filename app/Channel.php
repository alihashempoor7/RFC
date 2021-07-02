<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];
    protected $guard_name = 'web';

    public function threads(){
        return $this->hasMany(Thread::class);
    }

}

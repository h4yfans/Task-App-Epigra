<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $with = ['tasks'];

    public function user(){
        return $this->belongsTo(\App\User::class);
    }

    public function tasks(){
        return $this->hasMany(\App\Task::class);
    }
    
    public function followedTask(){
        return $this->hasMany(\App\FollowedTask::class);
    }

}

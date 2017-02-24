<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowedTask extends Model
{
    protected $with = ['todo'];

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function todo(){
        return $this->belongsTo(\App\Todo::class, 'todo_id');
    }

    public function tasks(){
        return $this->belongsTo(\App\Task::class, 'task_id');
    }
}

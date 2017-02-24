<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    public function todos(){
        return $this->belongsTo(\App\Todo::class, 'todo_id');
    }

    public function followedTasks(){
        return $this->belongsTo(\App\FollowedTask::class, 'task_id');
    }

    public function completedTasks(){
        return $this->hasMany(\App\CompletedTask::class, 'task_id');
    }
}

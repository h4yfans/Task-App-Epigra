<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $with = ['todos', 'followedTasks'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function todos()
    {
        return $this->hasMany(\App\Todo::class);
    }

    public function followedTasks()
    {
        return $this->hasMany(\App\FollowedTask::class, 'task_id');
    }

    public function followedTodos()
    {
        return $this->hasMany(\App\FollowedTask::class, 'todo_id');
    }

    public function completedTask()
    {
        return $this->hasMany(\App\CompletedTask::class, 'user_id');
    }
}

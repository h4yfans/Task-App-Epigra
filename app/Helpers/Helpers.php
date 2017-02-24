<?php

namespace App\Helpers;


use Carbon\Carbon;

class Helpers
{
    public static function diffInDays($start_date, $end_date)
    {
        $start = Carbon::parse($start_date);
        $end   = Carbon::parse($end_date);

        return $end->diffInDays($start);
    }

    public static function checkIfUserHasTask($task)
    {
        $users_task_id = $task->todos()->get()[0]->user_id;
        $auth_id       = \Auth::user()->id;

        return $users_task_id === $auth_id;
    }

    public static function isFollowing($todo)
    {

        foreach (\Auth::user()->followedTasks as $followedTask) {
            if ($followedTask->todo->id === $todo->id ) {
                return true;
            }
        }


        return false;
    }

}
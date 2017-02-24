<?php

namespace App\Http\Controllers;

use App\FollowedTask;
use App\Helpers\Helpers;
use App\Todo;
use Auth;
use Carbon\Carbon;

class FollowedTodoController extends Controller
{
    public function getAddFollowTodoList($id)
    {
        $todo = Todo::find($id);


        foreach ($todo->tasks()->get() as $task) {

            $followedTask             = new FollowedTask();
            $followedTask->user_id    = Auth::user()->id;
            $followedTask->todo_id    = $todo->id;
            $followedTask->task_id    = $task->id;
            $followedTask->start_date = Carbon::now();
            $followedTask->end_date   = Carbon::now()
                                              ->addDay(Helpers::diffInDays($task->start_date,
                                                  $task->end_date));
            $followedTask->save();
        }


        return redirect()->back();
    }

    public function getUnfollowTodoList($id)
    {
        $todo = Todo::find($id);

            foreach ($todo->followedTask as $followedTask) {
                $followedTask->delete();
            }


        return redirect()->back();
    }


    public function getFollowTodoList()
    {
        $followedTodoLists = Auth::user()->followedTodos()->get();
        $numberOfFollowedTodos =count($followedTodoLists->pluck('todo_id')->unique());




        return view('followed-tasks')
            ->with(['followedTodoList' => $followedTodoLists, 'numberOfFollowedTodos' => $numberOfFollowedTodos]);

    }


}

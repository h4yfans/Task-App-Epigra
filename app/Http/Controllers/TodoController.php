<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    /**
     * Yeni bir TodoList yaratma sayfasını getir.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAddListAction()
    {
        return view('new-list');
    }


    /**
     * Yeni bir TodoList yarat
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postAddListAction(Request $request)
    {

        $this->validate($request, [
            'list_name' => 'required|min:5'
        ]);

        $todo              = new Todo();
        $todo->name        = $request['list_name'];
        $todo->description = $request['list_description'];

        $request->user()->todos()->save($todo);

        return redirect('/');
    }


    public function getTaskListDetails($id)
    {
        $todo = Todo::find($id);

        return view('layouts.todo-detail')
            ->with(['todo' => $todo]);
    }

    public function getAllTaskList()
    {
        $todos = Todo::all();



        return view('all-task')
            ->with(['todos' => $todos]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddTaskRequest;
use App\Task;
use App\Todo;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * TaskController constructor.
     * Saat dilini Türkçe gösterir
     */
    public function __construct()
    {
        Carbon::setLocale('tr');
    }

    public function getTaskListAction()
    {
        return view('index');
    }


    /**
     * Eklenmek istenen Task'ın ismini ve tekrar edilmesi istenen günü ekle.
     * Tekrar edilecek günü, kayıt zamanı ve kayıt zamanı + tekrar edilmesi istenen günü ekle hesapla ve
     * Task için bir aralık oluştur.
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddTaskAction(CreateAddTaskRequest $request, $id)
    {


        $start_date = Carbon::now();
        $end_date   = Carbon::now()->addDay($request['task_repeat']);

        $task             = new Task();
        $task->name       = $request['task_new'];
        $task->start_date = $start_date;
        $task->end_date   = $end_date;

        $task->todos()->associate($id);
        $task->save();

        /* $to do = To do::find($id);
        $to do->tasks()->save($task);*/

        return redirect()->back();
    }

    /**
     * Güncellenmek istenen Task'a bağlı bilgileri getir.
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUpdateTaskAction($id)
    {
        $task = Task::find($id);

        $tasks_user_id = $task->todos()->get()[0]->user_id;
        $auth_id       = \Auth::user()->id;

        if ($auth_id === $tasks_user_id) {

            return view('edit-task')
                ->with(['task' => $task]);
        }

        return redirect()->back();
    }


    /**
     * Güncellenmek istenen Task'ı güncelle.
     * Eğer güncellenmek istenen Gün Tekrarı aynı ise condition'ı pas geç.
     *
     * @param CreateAddTaskRequest|Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postUpdateTaskAction(CreateAddTaskRequest $request, $id)
    {
        $this->validate($request, [
            'task_new'    => 'required',
            'task_repeat' => 'required|integer'
        ]);

        $task          = Task::find($id);
        $newDiffInDays = $request['task_repeat'];

        $task->name = $request['task_new'];

        $diffInDays = \App\Helpers\Helpers::diffInDays($task->start_date, $task->end_date);

        if ($diffInDays !== $newDiffInDays) {
            $task->end_date = Carbon::parse($task->start_date)->addDay($newDiffInDays);
        }

        $task->save();


        return redirect()->back();
    }


    public function getDeleteTaskAction($id)
    {
        $task = Task::find($id);

        $tasks_user_id = $task->todos()->get()[0]->user_id;
        $auth_id       = \Auth::user()->id;

        // Silinmek istenen Task'ın kullanıcıya ait olup olmadığını kontrol et
        if ($auth_id === $tasks_user_id) {
            $task->delete();
        }

        return redirect()->back();
    }


}

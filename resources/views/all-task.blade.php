@extends('layouts.master')

@section('content')
   <div class="text-center">
       <h3><i class="fa fa-angle-right"></i> Tüm Todo Listeleri</h3>
   </div>

    @if(count($todos))
        @foreach($todos as $key => $todo)
            <div class="mt centered">
                <div class="col-md-8 col-md-offset-2">
                    <section class="task-panel tasks-widget">
                        <div class="panel-heading">
                            <h5><i class="fa fa-tasks"></i> {{$todo->name}}</h5>
                            <h6> {{$todo->description}}</h6>
                            <div class="pull-right">
                                Task Sahibi: <strong>{{$todo->user->name}}</strong>
                            </div>
                            <br>

                            {{--    @if($todo->id === (isset(Auth::user()->followedTasks[$key]) ? Auth::user()->followedTasks[$key]->todo_id : false))
                                    Takiptesin
                                @endif--}}

                            {{--@foreach(Auth::user()->followedTasks as $followedTask)
                                @if($todo->id === $followedTask->todo->id)
                                    <strong> Takip Ediyorsun...</strong>
                                    @break
                                @endif
                            @endforeach--}}


                            @if(\App\Helpers\Helpers::isFollowing($todo))
                                <div class="pull-right">
                                    <a href="{{route('get.unfollowtodo', [$todo->id])}}">
                                        <button type="button" class="btn btn-danger btn-xs">Takipten Çık</button>

                                    </a>
                                </div>
                            @else
                                @if(Auth::user()->id !== $todo->user_id) {{--TodoListesi kullanıcıya mı ait?--}}
                                <div class="pull-right">
                                    <a href="{{route('get.addfollowtodo', [$todo->id])}}">
                                        <button type="button" class="btn btn-theme btn-xs">Takip Et</button>
                                    </a>
                                </div>
                                @endif
                            @endif




                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="task-content">
                                <ul class="task-list">
                                    @if(count($todo->tasks()->get()) > 0)
                                        @foreach($todo->tasks()->get() as $key => $task)
                                            <li>
                                                <div class="task-title">
                                                    <span class="task-title-sp">{{$key + 1}}) {{$task->name}}</span>
                                                    <span class="badge bg-success">Kalan Gün: {{\App\Helpers\Helpers::diffInDays($task->start_date, $task->end_date)}}</span>
                                                    <div class="pull-right hidden-phone">

                                                        @if(\App\Helpers\Helpers::checkIfUserHasTask($task))
                                                            <a href="{{route('get.taskupdate', ['id' => $task->id])}}">
                                                                <button class="btn btn-primary btn-xs"><i
                                                                            class="fa fa-pencil"></i></button>
                                                            </a>
                                                            <a href="{{route('get.taskdelete', ['id' => $task->id])}}">
                                                                <button class="btn btn-danger btn-xs"><i
                                                                            class="fa fa-trash-o "></i>
                                                                </button>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>Listeye kayıtlı task bulunmamaktadır.</li>
                                    @endif
                                </ul>
                            </div>
                            <div class=" add-task-row">
                                <a class="btn btn-default btn-sm pull-right"
                                   href="{{route('get.tododetails', ['id' => $todo->id ])}}">Detaylar</a>

                                @if(\App\Helpers\Helpers::checkIfUserHasTask($task))
                                    <a class="btn btn-theme03 btn-sm" data-toggle="modal"
                                       data-target=".bs-example-modal-lg-{{$todo->id}}">Task Ekle!</a>
                                @endif

                            </div>
                        </div>
                    </section>
                </div><!-- /col-md-12-->
            </div><!-- /row --><!-- /row -->


            <div class="modal fade bs-example-modal-lg-{{$todo->id}}" tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i>Task Ekle</h4>
                            <form class="form-horizontal style-form"
                                  action="{{route('post.addnewtask', ['id' => $todo->id])}}" method="POST">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Task Adı</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="task_new"
                                               placeholder="Veritabanı yedeği">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Gün Tekrar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="task_repeat"
                                               placeholder="21 (3 hafta)">
                                    </div>
                                </div>
                                {{csrf_field()}}
                                <a>
                                    <button type="submit" class="btn btn-theme03 btn-sm">Task Ekle!</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @else
        <div class="row mt">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="alert alert-danger"><p>Sistemde kayıtlı bir Todo Listesi bulunmamaktadır.</p>
                </div>
                <a href="{{route('get.addnewtasklist')}}">
                    <button type="button" class="btn btn-round btn-success">Liste Oluştur!</button>
                </a>
            </div>
        </div>


    @endif
@endsection

@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/to-do.css')}}">
@endsection
@extends('layouts.master')


@section('content')
    <h3><i class="fa fa-angle-right"></i> Taskı Güncelle</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <div class="col-sm-6 todo-info">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> {{$task->todos()->get()[0]->name}} - Listesi Taskı
                    </h4>
                    <form class="form-horizontal style-form" action="{{route('post.taskupdate',['id' => $task->id])}}"
                          method="post">

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Task Adı</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="task_new"
                                       value="{{$task->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Gün Tekrar*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="task_repeat"
                                       value="{{\App\Helpers\Helpers::diffInDays($task->start_date, $task->end_date)}}">
                                <div class="small">* Güncelleme sonrası sadece bitiş tarihinde değişiklik olacaktır.
                                    Varolan başlangıç tarihi değişmeyecektir.
                                </div>
                            </div>

                        </div>

                        {{csrf_field()}}

                        <a>
                            <button type="submit" class="btn btn-theme03 btn-sm">Taskı Güncelle</button>
                        </a>
                    </form>
                </div>

                <div class="col-sm-6 remain">
                    <h3>Ayrıntılar</h3>
                    <div class="thumb">

                        <h4><span class="badge bg-theme"><i class="fa fa-sun-o"></i></span>Başlangıç Tarihi:
                            <strong>{{\Carbon\Carbon::parse($task->start_date)->diffForHumans()}}</strong></h4>
                    </div>
                    <div class="thumb">
                        <h4><span class="badge bg-theme"><i class="fa fa-moon-o"></i></span>Bitiş Tarihi:
                            <strong>{{\Carbon\Carbon::parse($task->end_date)->diffForHumans()}}</strong>
                        </h4>
                    </div>
                    <div class="thumb">
                        <h4><span class="badge bg-theme"><i
                                        class="fa fa-bell-o"></i></span>Kalan Gün:
                            <strong>{{\App\Helpers\Helpers::diffInDays($task->end_date, \Carbon\Carbon::now())}}
                            </strong>
                        </h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <style>
        .thumb h4{
            font-size: 100%;
        }

        .remain span{
            font-size:100%;
            margin-right: 20px;
        }
        .thumb{
            padding-bottom: 10px !important;
        }

        .todo-info{
            border-right: 1px dotted #000;
        }
    </style>
@endsection
@extends('layouts.master')

@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Responsive Table</h4>
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed centered">
                        <thead>
                        <tr>
                            <th class="numeric">ID</th>
                            <th class="numeric">İsim</th>
                            <th class="numeric">Todo Liste Sayısı</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td class="numeric">{{$key}}</td>
                                <td class="numeric">{{$user->name}}</td>
                                <td class="numeric">{{count($user->todos)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </div><!-- /content-panel -->
        </div><!-- /col-lg-4 -->
    </div><!-- /row -->
@endsection

@section('styles')
    <style>
        thead th{
            text-align: center;
        }
    </style>

    @endsection
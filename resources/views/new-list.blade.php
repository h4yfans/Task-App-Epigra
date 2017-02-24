@extends('layouts.master')

@section('content')
    <div class="row mt">
        <div class="col-lg-10 col-lg-offset-1">
            @include('includes.info-box')
            <form class="form-horizontal style-form" action="{{route('post.addnewtasklist')}}" method="POST">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Yeni Liste Oluştur</h4>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Liste Adı*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="list_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Liste Açıklaması</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="list_description">
                        </div>
                    </div>
                    {{csrf_field()}}
                    <div class="pull-right">
                        <button type="submit" class="btn btn-theme04">Ekle!</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('content')

    <h3><i class="fa fa-angle-right"></i>{{$todo->name}} isimli Todo Listesinin Detayları</h3>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>Task Detayları</h4>
                <section id="unseen">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-condensed text-center">
                            <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>Task Adı</th>
                                <th>Task Sahibi</th>
                                <th>Taskın Başlama Tarihi</th>
                                <th>Taskın Tamamlandığı Tarih</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Veritabanı İşlemleri</td>
                                <td>Kaan Karaca</td>
                                <td>2016.02.23</td>
                                <td>2016.03.15</td>
                                <td><button type="button" class="btn btn-danger btn-sm">Sil</button></td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Veritabanı İşlemleri</td>
                                <td>Kaan Karaca</td>
                                <td>2016.02.23</td>
                                <td>2016.03.15</td>
                                <td><button type="button" class="btn btn-danger btn-sm">Sil</button></td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <div class="clearfix"></div>
            </div><!-- /content-panel -->
        </div><!-- /col-lg-4 -->
    </div><!-- /row -->

@endsection

@section('styles')
    <style>
        .text-center th{
            text-align: center !important;
        }
    </style>
    @endsection
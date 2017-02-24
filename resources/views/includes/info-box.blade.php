@if(count($errors) > 0)
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $key => $error)
                        <li style="list-style: none">{{$key +1}}) {{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if(Session::has('message'))
    <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        </div>
    </div>
@endif

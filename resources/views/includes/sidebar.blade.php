<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="/"><img src="{{URL::asset('img/ui-sam.jpg')}}" class="img-circle" width="60"></a></p>
            <h5 class="centered">{{Auth::user()->name}}</h5>

            <li class="mt">
                <a class="" href="{{route('get.addnewtasklist')}}">
                    <i class="fa fa-plus-circle"></i>
                    <span>Liste Ekle</span>
                </a>
            </li>

            <li class="mt">
                <a class="" href="{{route('index')}}">
                    <i class="fa fa-list"></i>
                    <span>Listelerim</span>
                </a>
            </li>

            <li class="mt">
                <a class="" href="{{route('get.followtodolist')}}">
                    <i class="fa fa-thumbs-up"></i>
                    <span>Takip Ettiğim Listeler</span>
                </a>
            </li>

            <li class="mt">
                <a class="" href="{{route('get.alltodos')}}">
                    <i class="fa fa-thumb-tack"></i>
                    <span>Bütün Listeler</span>
                </a>
            </li>

            <li class="mt">
                <a class="" href="{{route('get.userinfo')}}">
                    <i class="fa fa-user"></i>
                    <span>Üyeler</span>
                </a>
            </li>








        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
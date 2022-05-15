<div class="navbar-area">
    <div class="luvion-responsive-nav">
        <div class="container">
            <div class="luvion-responsive-menu">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                        <img src="{{asset('assets/img/black-logo.png')}}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="luvion-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                    <img src="{{asset('assets/img/black-logo.png')}}" alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    @php
                        $categories = \App\Models\Category::with("childs")->where("parent_id",0)->where("type","menu")->oldest()->get();
                    @endphp
                    <ul class="navbar-nav">
                        @foreach($categories as $category)
                            <li class="nav-item"><a href="{{route($category->link)}}" class="nav-link">{{$category->name}}@if($category->childs->count())<i class="fas fa-chevron-down"> @endif</i></a>
                                @if($category->childs->count())
                                    <ul class="dropdown-menu">
                                    @foreach($category->childs as $catChild)
                                        <li class="nav-item"><a href="index.html" class="nav-link active">{{$catChild->name}}</a></li>
                                    @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                    </ul>

                    <div class="others-options">
                        @auth
                            <a href="{{route("panel.index")}}" class="login-btn"><i class="flaticon-user"></i>پنل کاربری</a>
                        @endauth

                        @guest
                            <a href="{{url("/login")}}" class="login-btn"><i class="flaticon-user"></i> وارد شوید</a>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

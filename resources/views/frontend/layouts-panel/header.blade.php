<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="{{url('/')}}">
            <img class="large-logo" src="{{asset('admin/assets/media/image/logo.png')}}" alt="image">
            <img class="small-logo" src="{{asset('admin/assets/media/image/logo-sm.png')}}" alt="image">
            <img class="dark-logo" src="{{asset('admin/assets/media/image/logo-dark.png')}}" alt="image">
        </a>
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            <h3 class="page-title">داشبورد</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @yield("breadcrumb")
                    </li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->

        </div>

        <div class="header-body-right">
            <!-- begin::navbar main body -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="ti-bell font-weight-bold"
                           @if(auth()->user()->unreadNotifications->count())
                            {{"text-danger"}}
                           @endif
                        ></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="p-4 text-center" data-backround-image="admin/assets/media/image/image1.png">
                            <h6 class="m-b-0">اعلان ها</h6>
                            <small class="font-size-13 opacity-7">{{auth()->user()->unreadNotifications->count()}} اعلان خوانده نشده</small>
                        </div>
                        <div class="p-3">
                            <div class="timeline">
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                <div class="timeline-item">
                                    <div>
                                        <figure class="avatar avatar-state-danger avatar-sm m-r-15 bring-forward">
												<span class="avatar-title bg-info-bright text-info rounded-circle">
													<i class="fa fa-file-text-o font-size-20"></i>
												</span>
                                        </figure>
                                    </div>
                                    <div>
                                        <p class="m-b-5">
                                            <a class="text-dark font-weight-bold">{!! $notification->data['message'] !!} - <a
                                                    class="badge badge-danger text-white" href="{{url($notification->data['link'])}}">مشاهده پاسخ</a></a> </a>
                                        </p>
                                        <small class="text-muted">
                                            <i class="fa fa-clock-o m-r-5"></i> {{\Morilog\Jalali\Jalalian::forge($notification->created_at)->ago()}}
                                        </small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="p-3 text-right">
                            <ul class="list-inline small">
                                <li class="list-inline-item text-right">
                                    <a href="#">علامت خوانده شده به همه</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link bg-none" data-sidebar-open="#userProfile">
                        <div>
                            <figure class="avatar avatar-state-success avatar-sm">
                                <img src="{{'/assets/users/'.auth()->user()->profile_image}}" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- end::navbar main body -->

            <div class="d-flex align-items-center">
                <!-- begin::navbar navigation toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navigation-toggler">
                    <a href="#">
                        <i class="ti-menu"></i>
                    </a>
                </div>
                <!-- end::navbar navigation toggler -->

                <!-- begin::navbar toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
                    <a href="#">
                        <i class="ti-arrow-down"></i>
                    </a>
                </div>
                <!-- end::navbar toggler -->
            </div>
        </div>

    </div>
    <!-- end::header body -->

</div>

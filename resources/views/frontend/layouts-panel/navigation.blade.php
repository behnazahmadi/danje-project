<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li class="active" data-toggle="tooltip" title="داشبورد">
                <a href="#navigationDashboards" title="داشبوردها">
                    <i class="icon ti-pie-chart"></i>
                    <span class="badge badge-warning">2</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="navigation-menu-body">
        <ul id="navigationDashboards" class="navigation-active">
            <li>
                <a href="{{route("panel.index")}}">داشبورد</a>
            </li>
            <li>
                <a  href="{{route("panel.editProfile")}}">ویرایش حساب کاربری</a>
            </li>
            <li>
                <a class="" href="index.html">ویرایش  تنظیمات حساب کاربری</a>
            </li>
            <li>
                <a class="" href="{{route("panel.changePassword")}}">تغییر رمز عبور</a>
            </li>
            <li>
                <a class="" href="index.html">کیف پول</a>
            </li>
            <li>
                <a class="" href="{{route('panel.notifications')}}">اعلانات</a>
            </li>

            <li>
                <a class="" href="{{route('panel.tickets.index')}}">تیکت</a>
            </li>

            <li>
                <a class="" href="{{route('panel.bookmark.index')}}">بوکمارک</a>
            </li>

            <li>
{{--                <a href="{{route("panel.ticket")}}">تیکت ها<span class="badge badge-warning">2</span></a>--}}
            </li>
            <form action="{{url("logout")}}" method="post" id="logout_user">
                @csrf
            </form>
            <li>
                <a href="" onclick="event.preventDefault();document.getElementById('logout_user').submit()">خروج از حساب کاربری</a>
            </li>
        </ul>
    </div>
</div>

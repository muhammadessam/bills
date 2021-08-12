<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="#">
                    <img src="" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{route('admin.dashboard')}}" class="nav-link"> فاتورة </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{asset('adminassets/assets/img/90x90.jpg')}}" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a href="{{route('admin.settings.index')}}"><i data-feather="settings"></i>الاعدات</a>
                        </div>
                        <div class="dropdown-item">
                            <form action="{{route('logout')}}" method="post" class="d-flex" style="height: 41px">
                                @csrf
                                <button type="submit" class="border-0 w-100 bg-transparent"><i data-feather="log-out"></i>تسجيل الخروج</button>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            @foreach(config('adminpanel.menu') as $item )
                <li class="menu">
                    <a href="{{route($item['route'])}}" aria-expanded="false" data-active="{{Route::is($item['route']) ? 'true' : 'false'}}" class="dropdown-toggle">
                        <div class="">
                            <i data-feather="{{$item['icon']}}"></i>
                            <span>{{$item['name']}}</span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
<!--  END SIDEBAR  -->

<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i
                        class="fas fa-align-justify"></i></a></li>
        </ul>

        <ul class="nav-right profile-dropdown">
            <li class="dropdown"><a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                                    data-toggle="dropdown">
                    <div class="peer mR-10"><img class="w-2r bdrs-50p"
                                                 src="https://randomuser.me/api/portraits/men/10.jpg"
                                                 alt=""></div>
                    <div class="peer"><span class="fsz-sm c-grey-900">{{ Auth::user()->first_name }}</span></div>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i>
                            <span>Setting</span></a>
                    </li>
                    <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i>
                            <span>Profile</span></a></li>
                    <li><a href="email.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i
                                class="ti-email mR-10"></i>
                            <span>Messages</span></a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a class="d-b td-n pY-5 bgcH-grey-100 c-grey-700" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off mR-10"></i> <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</div>

{{--<div class="dropdown">--}}
{{--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--Dropdown button--}}
{{--</button>--}}
{{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--<a class="dropdown-item" href="#">Action</a>--}}
{{--<a class="dropdown-item" href="#">Another action</a>--}}
{{--<a class="dropdown-item" href="#">Something else here</a>--}}
{{--</div>--}}
{{--</div>--}}

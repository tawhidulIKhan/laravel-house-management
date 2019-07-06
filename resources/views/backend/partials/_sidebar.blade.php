<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed"><a class="sidebar-link td-n" href="index.html">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo"><img src="{{asset('images/logo.png')}}" alt=""></div>
                            </div>
                            <div class="peer peer-greed"><h5 class="lh-1 mB-0 logo-text">{{ config('app.name') }}</h5></div>
                        </div>
                    </a></div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived"><a class="sidebar-link" href="/"><span class="icon-holder"><i
                            class="c-blue-500 fas fa-home"></i> </span><span class="title">Dashboard</span></a></li>
            @can('user.index')
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('user.index')}}">
                    <span class="icon-holder">
                        <i class="text-primary fas fa-user"></i>
                    </span><span class="title">Users</span></a>
            </li>
            @endcan
            @can('house.index')
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('house.index')}}">
                    <span class="icon-holder">
                        <i class="text-primary fas fa-building"></i>
                    </span><span class="title">Houses</span></a>
            </li>
            @endcan
            @can('room.index')
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('room.index')}}">
                    <span class="icon-holder">
                        <i class="text-primary fas fa-building"></i>
                    </span><span class="title">Rooms</span></a>
            </li>
            @endcan
            @can('setting.index')
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('setting.index')}}">
                    <span class="icon-holder">
                        <i class="text-primary fas fa-setting"></i>
                    </span><span class="title">Settings</span></a>
            </li>
            @endcan
            @can('renter.index')
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('renter.index')}}">
                    <span class="icon-holder">
                        <i class="text-primary fas fa-users"></i>
                    </span><span class="title">Renters</span></a>
            </li>
            @endcan
            @can('transaction.index')
            <li class="nav-item">
                <a class="sidebar-link" href="{{route('transaction.index')}}">
                    <span class="icon-holder">
                        <i class="text-primary fas fa-dollar"></i>
                    </span><span class="title">Transsactions</span></a>
            </li>
            @endcan
        </ul>
    </div>
</div>

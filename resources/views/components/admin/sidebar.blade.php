<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/public" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('/assets/images/logo/dacademy.png') }}" alt="" class="logo logo-lg">
                <img src="/assets/images/logo/icon.png" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                <li class="nxl-item nxl-hasmenu {{ request()->is('/') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="nxl-link">
                        <span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                    </a>
                    <ul class="nxl-submenu">
                        <li class="nxl-item {{ request()->is('/') ? 'active' : '' }}"><a class="nxl-link" href="/dashboard">Home</a></li>
{{--                        <li class="nxl-item {{ request()->is('marketer/services') ? 'active' : '' }}"><a class="nxl-link" href="#">Services</a></li>--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/portfolios') ? 'active' : '' }}"><a class="nxl-link" href="#">Portfolios</a></li>--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/awards') ? 'active' : '' }}"><a class="nxl-link" href="#">Awards</a></li>--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/resume') ? 'active' : '' }}"><a class="nxl-link" href="#">Resume</a></li>--}}
                    </ul>
                </li>
                <a href="{{ route('orders.index') }}" class="nxl-link mt-3">
                    <span class="nxl-mtext">Orders</span><span class="nxl-arrow"></span>
                </a>


{{--                <li class="nxl-item nxl-hasmenu {{ request()->is('marketer*') ? 'active' : '' }}">--}}
{{--                    <a href="javascript:void(0);" class="nxl-link">--}}
{{--                        <span class="nxl-micon"><i class="feather-user"></i></span>--}}
{{--                        <span class="nxl-mtext">Marketer</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nxl-submenu">--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/about') ? 'active' : '' }}"><a class="nxl-link" href="#">About</a></li>--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/services') ? 'active' : '' }}"><a class="nxl-link" href="#">Services</a></li>--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/portfolios') ? 'active' : '' }}"><a class="nxl-link" href="#">Portfolios</a></li>--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/awards') ? 'active' : '' }}"><a class="nxl-link" href="#">Awards</a></li>--}}
{{--                        <li class="nxl-item {{ request()->is('marketer/resume') ? 'active' : '' }}"><a class="nxl-link" href="#">Resume</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}


            </ul>

        </div>
    </div>
</nav>

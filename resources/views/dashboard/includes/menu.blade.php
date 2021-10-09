<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded"  style="background-color: #283046;" data-scroll-to-active="true">
    <div class="navbar-header ">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <span class="brand-logo">
                        <img src="{{asset('photo/logo.png')}}" alt="">
                    </span>
                    <h2 class="brand-text " style="color: #28C76F !important">{{config('app.name')}}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="background: #283046;">
{{--            <li class="nav-item ">--}}

{{--            </li>--}}
            <li class=" nav-item menu-logo mt-2 mb-2" style="width: 260px">
            <a class="logo-brand d-flex mt-2 mb-2" href="{{route('dashboard')}}">
                <div class="logo">
                    <img src="{{asset('uploads/logoMarket').'/'.Auth::user()->logo}}" style="max-width: 100px">
                </div>
                <h4 class="brand-text menu-title text-truncate text-success d-flex align-items-center" style="color: #28C76F !important">
                    @if(App::isLocale('en'))
                        {{Auth::user()->market_name}}
                    @else
                        {{Auth::user()->market_name_ar}}
                    @endif

                </h4>
            </a>
            </li>
            <li class=" nav-item mt-1 mb-1">
                <a class="d-flex align-items-center" href="{{route('dashboard')}}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Home')}}</span>
                </a>
            </li>
{{--            <li class=" nav-item">--}}
{{--                <a class="d-flex align-items-center" href="{{route('roles.index')}}">--}}
{{--                    <i data-feather="trello"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Role Management')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            @can('Clients')
            <li class=" nav-item mt-1 mb-1">
                <a class="d-flex align-items-center" href="{{route('user.index')}}">
                    <i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Clients')}}</span>
                </a>
            </li>
            @endcan
            <li class=" nav-item mt-1 mb-1">
                <a class="d-flex align-items-center" href="{{route('order.index')}}">
                    <i data-feather="archive"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Orders')}}</span>
                </a >
            </li>
{{--            @can('Clients')--}}
{{--            <li class=" nav-item">--}}
{{--                <a class="d-flex align-items-center" >--}}
{{--                    <i data-feather="users"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="Users">{{__('Staff Management')}}</span>--}}
{{--                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">2</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    @can('Active Staff')--}}
{{--                    <li>--}}
{{--                        <a class="d-flex align-items-center" href="{{route('user.index',1)}}">--}}
{{--                            <i data-feather="circle"></i>--}}
{{--                            <span class="menu-item text-truncate" data-i18n="Analytics">{{__('Active Staff')}}</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endcan--}}
{{--                    <li>--}}
{{--                    @can('Suspended Staff')--}}
{{--                        <a class="d-flex align-items-center" href="{{route('user.index',0)}}">--}}
{{--                            <i data-feather="circle"></i>--}}
{{--                            <span class="menu-item text-truncate" data-i18n="eCommerce">{{__('Suspended Staff')}}</span>--}}
{{--                        </a>--}}
{{--                    @endcan--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            @endcan--}}

            @canany(['Products','Categories'])
                <li class=" nav-item mt-1 mb-1">
                    <a class="d-flex align-items-center" >
                        <img src="https://mapp.sa/cPanel/images/productss.svg" alt="">
                        {{--                    <i data-feather="users"></i>--}}
                        <span class="menu-title text-truncate" data-i18n="Users">{{__('Products')}}</span>
                        {{--                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">2</span>--}}
                    </a>
                    <ul class="menu-content">
                        @can('Products')
                            <li>
                                <a class="d-flex align-items-center" href="{{route('product.index')}}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Analytics">{{__('Products')}}</span>
                                </a>
                            </li>
                        @endcan
                        @can('Categories')
                            <li>
                                <a class="d-flex align-items-center" href="{{route('category.index')}}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Analytics">{{__('Categories')}}</span>
                                </a>
                            </li>
                        @endcan
                        @can('Brands')
                            <li>
                                <a class="d-flex align-items-center" href="{{route('brand.index')}}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Analytics">{{__('Brands')}}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
{{--            <li class=" nav-item mt-1 mb-1">--}}
{{--                <a class="d-flex align-items-center" href="#">--}}
{{--                    <i data-feather="pie-chart"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Reports')}}</span>--}}
{{--                </a >--}}
{{--            </li>--}}
            @can('Marketing')
                <li class=" nav-item mt-1 mb-1">
                    <a class="d-flex align-items-center" >
                        <i data-feather="shopping-cart"></i>
                        <span class="menu-title text-truncate" data-i18n="Users">{{__('Marketing')}}</span>
                        {{--                    <span class="badge badge-light-warning badge-pill ml-auto mr-1">2</span>--}}
                    </a>
                    <ul class="menu-content">
                        @can('NavBar')
                            <li>
                                <a class="d-flex align-items-center" href="{{route('marketing.navbar')}}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item text-truncate" data-i18n="Analytics">{{__('NavBar')}}</span>
                                </a>
                            </li>
                        @endcan
                        <li>
                        @can('Coupons')
                            <a class="d-flex align-items-center" href="{{route('coupon.index')}}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="eCommerce">{{__('Coupons')}}</span>
                            </a>
                        @endcan
                        </li>
                    </ul>
                </li>
            @endcan
            @can('Settings')
                <li class=" nav-item mt-1 mb-1">
                    <a class="d-flex align-items-center" href="{{route('setting.index')}}">
                        <i data-feather="settings"></i>
                        <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Settings')}}</span>
                    </a>
                </li>
            @endcan
            <li class=" nav-item mt-1 mb-1">
                <a class="d-flex align-items-center" href="{{route('partner.index')}}">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Partner Services')}}</span>
                </a>
            </li>
            <li class=" nav-item mt-1 mb-1 custom">
                <a class="d-flex align-items-center" href="http://market.lozcart.com/ar/{{Auth::user()->link}}" target="_blank">
                    <i data-feather="eye"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Preview My Store')}}</span>
                </a >
            </li>
{{--            <li class=" nav-item">--}}
{{--                <a class="d-flex align-items-center" href="{{route('chat.index')}}">--}}
{{--                    <i data-feather="trello"></i>--}}
{{--                    <span class="menu-title text-truncate" data-i18n="Dashboards">{{__('Chat With Admins')}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

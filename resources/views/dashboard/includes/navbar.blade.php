<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <li class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">

                <a class="btn btn-success "  href="{{route('plan.index')}}"  aria-haspopup="true" aria-expanded="false">
                    {{__('Subscriptions')}}
                </a>

        </div>

        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item d-none d-sm-block">
                <form class="app-search" method="POST" action="{{route('search.index')}}">
                    @csrf
            <div class="app-search-box">
                    <div class="input-group">
                        <input name="topBarQ" value="" type="text" class="form-control" placeholder="{{__('Search')}}...">
                        <div class="input-group-append">
                            <div class="select-input">
                                <select name="reference" required="" class=" form-control">
                                    <option selected="" value="product">
                                        {{__('Products')}}
                                    </option>
                                    <option value="client">
                                        {{__('Clients')}}
                                    </option>
                                    <option value="order">
                                        {{__('Orders')}}
                                    </option>
                                </select>
                            </div>
                            <button class="btn btn-success" id="search" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </li>
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(App::isLocale('en'))
                        <i class="flag-icon flag-icon-us"></i>
                        <span class="selected-language">{{__('English')}}</span>
                    @else
                        <i class="flag-icon flag-icon-ps"></i>
                        <span class="selected-language">{{__('Arabic')}}</span>
                    @endif

                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    <a class="dropdown-item" href="{{ url('lang/en') }}" data-language="en">
                        <i class="flag-icon flag-icon-us"></i> {{__('English')}}
                    </a>
                    <a class="dropdown-item" href="{{ url('lang/ar') }}" data-language="fr">
                        <i class="flag-icon flag-icon-ps"></i> {{__('Arabic')}}
                    </a>
                </div>
            </li>

            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="moon"></i>
                </a>
            </li>
{{--            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>--}}
{{--                <div class="search-input">--}}
{{--                    <div class="search-input-icon"><i data-feather="search"></i></div>--}}
{{--                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="search">--}}
{{--                    <div class="search-input-close"><i data-feather="x"></i></div>--}}
{{--                    <ul class="search-list search-list-main"></ul>--}}
{{--                </div>--}}
{{--            </li>--}}

            <li class="nav-item dropdown dropdown-notification mr-25">
                <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                    <i class="ficon" data-feather="bell"></i>
                    <span class="badge badge-pill badge-danger badge-up count " data-count="{{$notifications->count()}}">{{$notifications->count()}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">{{__('Notifications')}}</h4>
                            <div class="badge badge-pill badge-light-primary ">
                                <span class="count">{{$notifications->count()}}</span> {{__('New')}}</div>
                        </div>
                    </li>
                    <audio id="notify">
                        <source src="{{asset('photo/notfiy.mp3')}}" type="audio/mpeg">
                    </audio>
                    <li class="scrollable-container media-list">
                        @foreach ($notifications as $item)
                            @if ($item->type=='App\Notifications\NewOrder')
                                <a class="d-flex" href="{{route('notification.order.show',[$item->data['order_id'],$item->id])}}">
                            @endif
                            @if ($item->type=='App\Notifications\AcceptDomain')
                                <a class="d-flex" href="{{route('domain.index',$item->id)}}">
                            @endif
                            @if ($item->type=='App\Notifications\RejectDomain')
                                <a class="d-flex" href="{{route('domain.index',$item->id)}}">
                            @endif
                            @if ($item->type=='App\Notifications\AcceptPayment')
                                <a class="d-flex" href="{{route('payment.index',$item->id)}}">
                            @endif
                            <div class="media d-flex align-items-start ">
                                <div class="media-left">
                                    <div class="avatar">
                                        <img src="http://lozcart.com/market/public/photo/box-1.svg" alt="avatar" width="32" height="32">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading">
                                        <span class="font-weight-bolder">{{$item->data['title']}}</span>

                                    </p>
                                    <small class="notification-text"> {{$item->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach


                    </li>
                    <li class="dropdown-menu-footer">
                        <a class="btn btn-success btn-block" href="{{route('notification.read_all')}}">{{__('Read all notifications')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{Auth::user()->owner_name }}</span>
                        <span class="user-status">{{App::isLocale('en')? Auth::user()->market_name : Auth::user()->market_name_ar}}</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{asset('uploads/logoMarket').'/'.Auth::user()->logo}}" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{route('profile.index')}}">
                        <i class="mr-50" data-feather="user"></i> {{__('Profile')}}
                    </a>


                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="mr-50" data-feather="power"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('app-assets/images/icons/xls.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('app-assets/images/icons/jpg.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('app-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
            <div class="d-flex">
                <div class="mr-75"><img src="{{asset('app-assets/images/icons/doc.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
            <h6 class="section-label mt-75 mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-14.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
            <div class="d-flex align-items-center">
                <div class="avatar mr-75"><img src="{{asset('app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>
<!-- END: Header-->

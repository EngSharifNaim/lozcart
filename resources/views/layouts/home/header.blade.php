<header id="header-wrap">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-md   ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <!-- <a href="{{asset('/')}}" class="navbar-brand"><img
                        src="{{asset('/looz/loozLandingPage/img/logo-matjer.png')}}" alt=" متجر إلكتروني  "></a> -->
                        <a href="{{url('/')}}"><img src="{{asset('/looz/loozLandingPage/img/logo_black1.png')}}" alt="" ></a>
                <button class="navbar-toggler" style="border:0;margin:0 -5px" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <img src="{{asset('/looz/loozLandingPage/img/m.png')}}" width="44" style="border:0"
                        alt=" متجر إلكتروني  ">

                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-10 justify-content-end clearfix">

                        <li class="nav-item">
                            <a class="nav-link" href="#" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal_academic">
                                {{__('Loz Academy')}}
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('pricing')}}">
                                {{__('Packages')}}
                            </a>
                        </li>
                        <li class="nav-item rfr">

                            <a class="nav-link" href="{{route('login')}} ">
                                {{__('Login')}}
                            </a>
                        </li>
                        <li class="nav-item">
                                @if(App::isLocale('en'))
                                   <a class="nav-link" href="{{ url('lang/ar') }}" data-language="fr">ع
                                </a>
                                @else
                                    <a class="nav-link" href="{{ url('lang/en') }}" data-language="en">EN
                                </a>
                                @endif
                        </li>
                    </ul>
                    <ul>
                        <div>
                            <li>
                                <a href="{{route('register')}}" class=" text-left btn-circle6 btn btn-common"
                                    style=";border-radius: 100px;margin:15px 0 0 0;padding:7px 30px; "> {{__('Start Now')}} </a>


                            </li>

                        </div>
                    </ul>
                </div>

            </div>
        </nav>
        <!-- Navbar End -->
        <!-- Hero Area Start -->
        @yield("header-nav")

        <!-- Hero Area End -->
    </header>

<footer class="foorr">
        <div class="container">
            <div class="row footer-onel-new">
                <div class="trr col-md-4">
                    <h5>{{__('About LozCart')}} </h5>
                    <ul>
                        <ul>
                            <li><a href="{{route('partners')}}"> {{__('our partners')}} </a></li>
                            <li><a href="{{route('faqs')}}"> {{__('common questions')}} </a></li>
                            <li><a href="{{route('privacy')}}">{{__('Privacy policy')}}</a></li>
                            <li><a href="{{route('terms')}}"> {{__('Terms and Conditions')}} </a></li>
                            <li><a target="_blank" href="mailto:hr@mapp.sa"> {{__('Join us')}} </a></li>
                            <li><a href="mailto:info@mapp.sa"> {{__('Connect with us')}} </a></li>

                        </ul>
                </div>
                <div class="trr col-md-4">
                    <h5> {{__('Links')}} </h5>
                    <ul>
{{--                        <li><a target="_blank" href="https://blog.mapp.sa/"> المُدونة </a></li>--}}
                        <li><a href="#" data-toggle="modal" data-target="#modal_academic">{{__('Loz Academy')}}</a></li>
                        <li><a href="{{route('marketing')}}"> {{__('Affiliate Marketing Program')}} </a></li>
                        <li><a href="{{route('register')}}">{{__('Register now')}}</a></li>
                        <li><a href="{{route('login')}}"> {{__('Login')}} </a></li>
                    </ul>
                </div>
                <div class="trr col-md-4 social-h5 col-12 ">
                    <h5>{{__('Connect with us')}} </h5>
                    <div class="social-icon " style="display: flex;">
                        @if ($twitter)
                            <a data-toggle="tooltip" data-placement="bottom" title=" {{__('Twitter')}}  " class="facebook"
                               href="{{$twitter->value}}" target="_blank">
                                <img alt="تطبيق متجر الكتروني  " src="{{asset('looz/loozLandingPage/img/twitter.png')}}" width="30"></a>
                        @endif

                        @if ($instagram)
                            <a data-toggle="tooltip" data-placement="bottom" title=" {{__('Instagram')}}  " class="twitter"
                               href="{{$instagram->value}}" target=_blank>
                                <img alt="تطبيق متجر الكتروني  " src="{{asset('looz/loozLandingPage/img/instagram.png')}}" width="30"></a>
                        @endif

                        @if ($linkedin)
                            <a data-toggle="tooltip" data-placement="bottom" title=" {{__('LinkedIn')}}   " class="instagram"
                               href="{{$linkedin->value}}" target=_blank><img
                                    alt="تطبيق متجر الكتروني  " src="{{asset('looz/loozLandingPage/img/in.png')}}"
                                    width="30"></a>
                        @endif

                        @if ($facebook)
                            <a data-toggle="tooltip" data-placement="bottom" title=" {{__('Facebook')}}   " class="linkedin"
                               href="{{$facebook->value}}" target=_blank>
                                <img alt="تطبيق متجر الكتروني  " src="{{asset('looz/loozLandingPage/img/facebook.png')}}" width="30"></a>
                        @endif
                        @if($youtube)
                        <a data-toggle="tooltip" data-placement="bottom" title="{{__('YouTube')}}" class="linkedin"
                            href="{{$youtube->value}}"
                            target=_blank><img alt="تطبيق متجر الكتروني  "
                                src="{{asset('looz/loozLandingPage/img/youtube.png')}}" width="35"></a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12 footer-down text-center">
            <h6 class="text-center a-footer">{{__('All rights reserved to LozCart © 2021')}}</h6>
        </div>
    </footer>

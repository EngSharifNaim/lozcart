<!DOCTYPE html>
<html lang="en">
<script src="{{asset('/looz/loozLandingPage//js/jquery-2.2.1.min.js')}}"></script>
<script type="text/javascript"
    src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

<link id=favicon rel="shortcut icon" href="{{asset('/photo/favicon/apple-icon-120x120.png')}}" type=image/png>



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <title>  @yield("title") منصة لوز</title>

    @if(App::isLocale('en'))
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/bootstrap.min.css')}}">
    @endif

    @if(App::isLocale('ar'))
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/bootstrap-rtl.css')}}">
    @endif
    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/fonts/line-icons.css')}}">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/owl.theme.css')}}">


    <link id=favicon rel="shortcut icon" href="{{asset('/looz/loozLandingPage/img/matajerApp.png')}}"
        type=image/png>



    <meta name=description
        content=" منصة لوزللتجارة الإلكترونية  ،  ابدأ تجارتك الإلكترونية و أمتلك موقع و تطبيق متجر الكتروني خاص بك بجميع مزايا التجارة الالكترونية و بأقل التكاليف و بدون عمولات خفيه .  ، افتح  متجر الكتروني ،   ,   ">
    <meta name=keywords
        content="منصة لوزللتجارة الإلكترونية  ،  ابدأ تجارتك الإلكترونية و أمتلك موقع و تطبيق متجر الكتروني خاص بك بجميع مزايا التجارة الالكترونية و بأقل التكاليف و بدون عمولات خفيه .  ، افتح  متجر الكتروني ،   ,   ">
    <meta name=“yandex-verification” content=“9200ea99dbfe504e” />

    <!-- Animate -->
    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/animate.css')}}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/main.css')}}">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/responsive.css')}}">

    @if(App::isLocale('en'))
        <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/main-en.css')}}">
    @endif

    <style>
    .ftur_thumb img {
        max-width: 100%;
    }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150819998-1"></script>
    <!-- Snap Pixel Code -->
    <script type='text/javascript'>
    (function(e, t, n) {
        if (e.snaptr) return;
        var a = e.snaptr = function() {
            a.handleRequest ? a.handleRequest.apply(a, arguments) : a.queue.push(arguments)
        };
        a.queue = [];
        var s = 'script';
        r = t.createElement(s);
        r.async = !0;
        r.src = n;
        var u = t.getElementsByTagName(s)[0];
        u.parentNode.insertBefore(r, u);
    })(window, document,
        'https://sc-static.net/scevent.min.js');
    snaptr('init', '54cad88f-63c0-4547-ae1e-a088591e6a76', {
        'user_email': '_INSERT_USER_EMAIL_'
    });
    snaptr('track', 'PAGE_VIEW');
    </script>
    <!-- End Snap Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150819998-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-150819998-1');
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-150819998-1');
    </script>
    <div class="text-right" id="whatsappIcon" style="position:fixed ;z-index: 999999999; bottom:13px;left:15px;">
        <a target="_blank" href="https://api.whatsapp.com/send?phone={{$phone->value}}"><img
                src="{{asset('/looz/loozLandingPage/img/2w.png')}}" alt=" متجر الكتروني  "
                style="z-index: 100;width:45px"></a>
    </div>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!-- Hotjar Tracking Code for http://mapp.sa -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 1997737,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
        </script>
        <script>
        $(window).scroll(function(event) {
            var scroll = $(window).scrollTop();
            if (scroll >= 3800) {
                $("#whatsappIcon").addClass('whatsAppIconMove');
            } else {
                $("#whatsappIcon").removeClass('whatsAppIconMove');
            }
        });
    </script>
    <style>
    .whatsAppIconMove {
        bottom: 50px !important;
    }
    </style>
    <script>
    setTimeout(function() {
        $('.my-alert-success').fadeOut();
    }, 5000);
    </script>
    @yield('jshead')
</head>

<body id="index">
    <div class="row m-2" style="direction: ltr">
        <div class="col-md-4">
            <!-- block -->
        </div>
    </div>
    <!-- Header Area wrapper Starts -->
    @include("layouts.home.header")
    <!-- Header Area wrapper End -->

    @include("layouts.shared.msg")
                @yield("content")

    <!-- Footer Section Start -->
    @include("layouts.home.footer")
    <!-- Footer Section end -->

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade modal_st2" id="modal_academic" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style=" ; border-radius: 3px;padding:10px 15px 10px 15px">
                    <img src="{{asset('/looz/loozLandingPage/img/أكاديمة_متاجر.png')}}" alt="أكاديمة متاجر"
                        style="position:relative;top:0px" width="150" class="text-center">

                    <button type="button" class="close" style="position: relative;top:9px;right: -10px"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="text-center">

                            </div>
                            <div class="txt_modal_academic text-center">

                                <h2>{{__('Notify me when the academy is ready')}}</h2>
                                <p>
                                    {{__('Start your e-commerce and own your own e-commerce website and application with all the advantages of commerce')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="subscribe_academic">
                        <form class="form_academic" action="academyMailchimpSubscription" method="post"
                            id="mc-embedded-subscribe-form">
                            <input type="hidden" name="_token" value="bu8b9CefClwfeDSC1b7j4eC5pOdDjAE9hXeVYycs"> <input
                                id="EMAIL" type="email" required name="EMAIL" class="form-control"
                                placeholder="{{__('Email')}}">
                            <button type="submit" class="btn btn_subscribe btn-common btn_primary" value="Subscribe"
                                name="subscribe" id="mc-embedded-subscribe">{{__('Register now')}}
                            </button>
                        </form>

                        <!-- Begin Mailchimp Signup Form -->

                        <!--End mc_embed_signup-->
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script type="text/javascript" id="pap_x2s6df8d" src="https://www.linkaraby.com/scripts/2xjh8l8dq0"></script>
    <script type="text/javascript">
    PostAffTracker.setAccountId('4ad3954f');
    try {
        PostAffTracker.track();
    } catch (err) {}
    </script>








    <link rel="stylesheet" href="{{asset('/looz/loozLandingPage/css/owl.carousel.css')}}">


    <script src="{{asset('/looz/loozLandingPage/js/j/jquery-2.2.1.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/j/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/waypoints.min.js')}}"></script>

    <script src="{{asset('/looz/loozLandingPage/js/jquery.counterup.min.js')}}"></script>

    <script>
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
    </script>
    <script src="{{asset('/looz/loozLandingPage/js/j/main.js')}}"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('/looz/loozLandingPage/js/jquery-min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/popper.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/jquery.nav.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/scrolling-nav.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/main.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/form-validator.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/contact-form-script.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/looz/loozLandingPage/js/validate.js')}}"></script>


    <script>
    $('#mc-embedded-subscribe-form').validate({
        rules: {
            EMAIL: {
                required: true,
                //     email: true
            }
        },
        messages: {
            EMAIL: "{{__('Please enter email')}}",
        }
    });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    @yield('js')
</body>
</html>

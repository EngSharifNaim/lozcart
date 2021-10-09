<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{config('app.name')}}</title>

    <link rel="apple-touch-icon" href="{{asset('/photo/favicon/apple-icon-120x120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/photo/favicon/favicon.ico')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" href="{{asset('/photo/favicon/manifest.json')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
@if(App::isLocale('en'))
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    <style>
        .auth-wrapper.auth-v2 .brand-logo {
            position: absolute;
            top: 2rem;
            right: unset;
            left: 2rem;
            margin: 0;
            z-index: 1;
        }
    </style>
    @else
    <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
        <!-- END: Vendor CSS-->
        <style>
            @font-face {
                font-family: sst-arabic-roman;
                src: url({{asset('assets/fonts/sst-arabic-roman.ttf')}});
            }

            body{
                direction: rtl;
                font-family: 'sst-arabic-roman', sans-serif !important;

            }
        </style>
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/bordered-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/themes/semi-dark-layout.css')}}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/forms/form-validation.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/page-auth.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
        <style>
            .auth-wrapper.auth-v2 .brand-logo {
                position: absolute;
                top: 2rem;
                right: unset;
                left: 2rem;
                margin: 0;
                z-index: 1;
            }
            </style>
    @endif
    <style>
        .btn-success {
            border-color: #096d3e !important;
            background-color: #096d3e !important;
            color: #FFFFFF !important;
        }
        .text-center a{
            color: #096d3e !important;;
        }
        .custom-control-input:checked ~ .custom-control-label::before {
            color: #FFFFFF;
            border-color: #096d3e;
            background-color: #096d3e;
        }
        .form-control:focus {
            border-color: #0e7042;
        }
        .input-group:not(.bootstrap-touchspin):focus-within .form-control, .input-group:not(.bootstrap-touchspin):focus-within .input-group-text {
            border-color: #096d3e;
            box-shadow: none;
        }
        .custom-control-input:focus:not(:checked) ~ .custom-control-label::before {
            border-color: #096d3e;
        }
        .custom-control-input:not(:disabled):active ~ .custom-control-label::before {
            background-color: #096d3e;
            border-color: #096d3e;
        }
        .modal .sp-icon {
            border: 2px solid #096d3e;
            border-radius: 50px;
            width: 70px;
            height: 70px;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .form-icon {
            position: absolute;
            top: 0;
            left: auto;
            right: -8px;
            z-index: 2;
            display: block;
            width: 40px;
            height: 50px;
            line-height: 48px;
            text-align: center;
            pointer-events: none;
        }

        .modal .form-group  {
            position: relative; !important;
        }
        .modal .form-group input {
            background: #eee;
            border-radius: 200px;

            padding: 22px;

            margin-bottom: 0;

            /* border: 0; */
             appearance: none;
        }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('custom/fonts/line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/util.css')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v2">
                <div class="auth-inner row m-0">
                    <!-- Brand logo-->
                    <a class="brand-logo" href="{{url('/')}}">
                        <img style="width: 140px" src="{{asset('/looz/loozLandingPage/img/logo_black.png')}}" alt="">
{{--                        <h2 class="brand-text text-primary ml-1">{{config('app.name')}}</h2>--}}
                    </a>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-6 align-items-center p-0 " style="height: 100vh; ">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center ">
                            @if(App::isLocale('en'))
                                <img class="img-fluid w-100" style="height: 100vh; " src="{{asset('/photo/login1.png')}}" alt="Login V2" />
                            @else
                                <img class="img-fluid w-100" style="height: 100vh; " src="{{asset('/photo/login.png')}}" alt="Login V2" />
                            @endif

                        </div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class=" d-flex col-lg-6 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
{{--                            <h2 class="card-title font-weight-bold mb-1">{{__('Welcome to')}} {{config('app.name')}}! 👋</h2>--}}
                            <h2 class="card-text text-center mb-2" style="    margin: 70px 0 0 0;color: #096d3e;font-weight: bolder;">{{__('Login')}}</h2>
                            <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="login-email">{{ __('E-Mail Address') }}</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="login-email"
                                       type="text" name="email" placeholder="john@example.com" aria-describedby="login-email" value="{{ old('email') }}" autofocus="" tabindex="1" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="login-password">{{ __('Password') }}</label>
                                        @if (Route::has('password.request'))

                                            <a href="#" data-toggle="modal" data-target="#forgetPasswordModal"
                                               class="m-link" data-dismiss="modal"
                                               style="color:#096d3e;margin:10px;font-weight: normal; ">
                                                <small> {{ __('Forgot Your Password?') }}</small>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                        <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3">
                                        <label class="custom-control-label" for="remember-me"> {{ __('Remember Me') }}</label>
                                    </div>
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input class="custom-control-input" id="remember" type="checkbox" tabindex="3" />--}}
{{--                                        <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <button class="btn btn-success btn-block" tabindex="4">{{__('Sign in')}}</button>
                            </form>
                            <p class="text-center mt-2">
                                <span>{{__('You do not have an account in LozCart ?')}} </span>
                                <a href="{{route('register')}}">
                                    <span>&nbsp;{{__('Register now')}}</span>
                                </a>
                            </p>
                        </div>

                    </div>
                    <!-- /Login-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<!----- rest  pass start-------------------------------->
<div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style=";padding:0 0 40px 0">
            <div class="modal-header" style="border: 0">
                <button type="button" style="color: #999" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <span class="sp-icon">
                    <i style="color: #096d3e" class="material-icons">lock_outline</i>
                </span>
                <h5 style="color: #096d3e" class="modal-title text-center mt-3" id="exampleModalLongTitle">
                    {{ __('Forgot Your Password') }}
                </h5>
                <p class="m-link p-3" style="font-size: 14px;">{{__('Enter your email and we will send a verification code to reset your password')}}</p>
            </div>

            <div class="container">
                <form method="post" role="form" action="javascript:;" id="forgetModalVald">
                    @csrf
                    <div class="col-md-12 ">
                        <div class="form-group ">
                            <input  required class="form-control" type="email" placeholder="{{__('Email')}}" value="" id="forgotPasswordEmail"
                                   name="email"/>
                            <span class="invalid-feedback order-last" id="invalid-feedback-forgotPassword">   </span>

                            <div class="form-icon">
                                <i class="fe-mail"></i>
                            </div>
                        </div>

                        <div class="form-group  col-md-6 " >
                            <button  id="send1" onclick="sendEmail()" class="btn btn-success btn-submit" >
                                {{__('Send')}}
                            </button>

                        </div>
{{--                        <div class="col-md-2" style="float: left">--}}
{{--                            <img id="loaderIcon" src="https://mapp.sa/cPanel/media/img/load.gif" alt="Loading..."--}}
{{--                                 width="40px" style="display: none;">--}}
{{--                        </div>--}}


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----- rest  pass end-------------------------------->

<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style=";padding:0 0 40px 0">
            <div class="modal-header" style="border: 0">
                <button type="button" style="color: #999" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="text-right" style="     padding: 0px 30px;
            position: absolute;
            top: 16px;">
                <a href="#" data-toggle="modal" data-target="#forgetPasswordModal" class="m-link"
                   data-dismiss="modal"><i class="fe-chevron-right" style="font-weight: 700;    color: #cccccc;"></i></a>
            </div>
            <div class="modal-body text-center">



                <span class="sp-icon"><i class="material-icons">lock_open</i> </span>
                <h6 class="modal-title text-center" id="exampleModalLongTitle">{{__('Reset password')}}</h6>
                <p class="m-link p-3" style="font-size: 14px;">{{__('Enter the new password and then confirm it again')}}</p>
            </div>


            <div class="container">
                <form role="form" action="javascript:;" id="resetForm" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="col-md-12 ">

                        <div class="form-group ">
                            <input id="resetCodeInput" required
                                   name="code" type="text" class="form-control"
                                   placeholder="{{__('Enter the sent code')}}" value=""/>
                            <div class=" alert-danger" id="error-alert"></div>
                            <div class="form-icon">
                                <i class="fe-command"></i>
                            </div>
                        </div>
                        <input id="forgotEmail" type="email" name="email" required style="display: none">
                        <div class="form-group ">
                            <input id="new_password" required name="new_password"
                                    type="password"
                                   class="form-control" placeholder="{{__('New password')}}" value=""/>
                            <div class="form-icon">
                                <i class="fe-unlock"></i>
                            </div>
                        </div>
                        <div class="form-group  ">
                            <input id="password_confirmation" required name="password_confirmation"
                                    type="password"
                                   class="form-control" placeholder="{{__('Confirm password')}}"
                                   value=""/>
                            <div class="form-icon">
                                <i class="fe-unlock"></i>
                            </div>
                        </div>

                        <div class="form-group  col-md-6">
                            <button class="btn btn-success" id="send2"  onclick="Reset()" id="resetPassword">{{__('Password Reset')}}</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- BEGIN: Vendor JS-->
<script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->


<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('/app-assets/js/scripts/pages/page-auth-login.js')}}"></script>
<!-- END: Page JS-->
<script src="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>

<script src="{{asset('/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
<script>
    $(document).ready(function() {

        $form = $('#forgetModalVald');
            $(function () {
                'use strict';

                var forgetModalVald = $('#forgetModalVald');
// console.log(addClient)
                // jQuery Validation
                // --------------------------------------------------------------------
                if (forgetModalVald.length) {
                    forgetModalVald.validate({

                        rules: {
                            // 'street_address': {
                            //     required: true,
                            // },
                            'email': {
                                required: true,
                                email: true
                            },
                            // password: {
                            //     required: true,
                            //     minlength: 9
                            // },
                            // 'password_confirmation': {
                            //     required: true,
                            //     equalTo: '#password'
                            // },
                            // country_id: {
                            //     required: true
                            // },
                            // mobile: {
                            //     required: true,
                            //     minlength: 10
                            // },

                        }
                    });
                }
            });

        jQuery.extend(jQuery.validator.messages, {
            required: "{{__('This field is required.')}}",
            remote: "{{__('Please fix this field.')}}",
            email: "{{__('Please enter a valid email address.')}}",
            url: "{{__('Please enter a valid URL.')}}",
            date: "{{__('Please enter a valid date.')}}",
            dateISO: "{{__('Please enter a valid date (ISO).')}}",
            number: "{{__('Please enter a valid number.')}}",
            digits: "{{__('Please enter only digits.')}}",
            creditcard: "{{__('Please enter a valid credit card number.')}}",
            equalTo: "{{__('Please enter the same value again.')}}",
            accept: "{{__('Please enter a value with a valid extension.')}}",
            maxlength: jQuery.validator.format("{{__('Please enter no more than {0} characters.')}}"),
            minlength: jQuery.validator.format("{{__('Please enter at least {0} characters.')}}"),
            rangelength: jQuery.validator.format("{{__('Please enter a value between {0} and {1} characters long.')}}"),
            range: jQuery.validator.format("{{__('Please enter a value between {0} and {1}.')}}"),
            max: jQuery.validator.format("{{__('Please enter a value less than or equal to {0}.')}}"),
            min: jQuery.validator.format("{{__('Please enter a value greater than or equal to {0}.')}}")
        });
    });

</script>
<script>
    $(document).ready(function() {

        $form = $('#resetForm');
            $(function () {
                'use strict';

                var resetForm = $('#resetForm');
// console.log(addClient)
                // jQuery Validation
                // --------------------------------------------------------------------
                if (resetForm.length) {
                    resetForm.validate({

                        rules: {

                            new_password: {
                                required: true,
                                minlength: 9
                            },
                            'password_confirmation': {
                                required: true,
                                equalTo: '#new_password'
                            },
                            code: {
                                required: true
                            },
                            // mobile: {
                            //     required: true,
                            //     minlength: 10
                            // },

                        }
                    });
                }
            });

        jQuery.extend(jQuery.validator.messages, {
            required: "{{__('This field is required.')}}",
            remote: "{{__('Please fix this field.')}}",
            email: "{{__('Please enter a valid email address.')}}",
            url: "{{__('Please enter a valid URL.')}}",
            date: "{{__('Please enter a valid date.')}}",
            dateISO: "{{__('Please enter a valid date (ISO).')}}",
            number: "{{__('Please enter a valid number.')}}",
            digits: "{{__('Please enter only digits.')}}",
            creditcard: "{{__('Please enter a valid credit card number.')}}",
            equalTo: "{{__('Please enter the same value again.')}}",
            accept: "{{__('Please enter a value with a valid extension.')}}",
            maxlength: jQuery.validator.format("{{__('Please enter no more than {0} characters.')}}"),
            minlength: jQuery.validator.format("{{__('Please enter at least {0} characters.')}}"),
            rangelength: jQuery.validator.format("{{__('Please enter a value between {0} and {1} characters long.')}}"),
            range: jQuery.validator.format("{{__('Please enter a value between {0} and {1}.')}}"),
            max: jQuery.validator.format("{{__('Please enter a value less than or equal to {0}.')}}"),
            min: jQuery.validator.format("{{__('Please enter a value greater than or equal to {0}.')}}")
        });
    });

</script>
</body>
<script>

    function myHandel(obj, id) {
        if ('responseJSON' in obj)
            obj.messages = obj.responseJSON;
        $('input,select,textarea').each(function () {
            var parent = "";
            if ($(this).parents('.form-group').length > 0)
                parent = $(this).parents('.form-group');
            if ($(this).parents('.input-group').length > 0)
                parent = $(this).parents('.input-group');
            var name = $(this).attr("name");
            if (obj.messages && obj.messages[name] && ($(this).attr('type') !== 'hidden')) {
                var error_message = '<div class="col-md-8 offset-md-3 custom-error"><p style="color: red">' + obj.messages[name][0] + '</p></div>'
                parent.append(error_message);
            }
        });
    }
    function sendEmail() {
        let invalidDiv = $('#invalid-feedback-forgotPassword');
        // let loadIcon = $('#loaderIcon');
        invalidDiv.hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        const email = $('#forgotPasswordEmail').val();
        if (email !== "") {
            // loadIcon.css('z-index', '9999');
            invalidDiv.hide();
            // loadIcon.fadeIn();
            $('#send1').html('');
            $('#send1').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                '<span class="ml-25 align-middle">{{__('Sending...')}}</span>');
            $.ajax({
                type: "POST",
                url: "{{route('StoreforgotPassword')}}",
                data: {email: email},

                success: function (data) {
                    if (data.status === 1) {
                        $('#forgetPasswordModal').modal('hide');
                        $(".modal-backdrop").remove();
                        $('#resetPasswordModal').modal('toggle');
                        $('#forgotEmail').val(email);

                    } else {

                        invalidDiv.show();
                        invalidDiv.html('<label id="forgotPasswordEmail-error" class="error" for="forgotPasswordEmail">' + data.message + '</label>');
                    }
                    $('#send1').empty();
                    $('#send1').html('{{__('Send')}}');
                },
                error: function (data) {
                    var response = data.responseJSON;
                    $('#send1').empty();
                    $('#send1').html('{{__('Send')}}');
                    if (data.status == 422) {
                        if (typeof (response.responseJSON) != "undefined") {
                            myHandel(response);
                        }
                    } else {
                        swal.fire({
                            icon: 'error',
                            title: response.message
                        });
                    }
                },
                complete: function () {
                    //do nothing

                }
            });
            // $('#loaderIcon').fadeIn(100);
            // $('#forgotPassword').css('cursor', 'progress');
        } else {
            invalidDiv.show();
        }

    }

    function Reset() {


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const email = $('#forgotEmail').val();
        const code = $('#resetCodeInput').val();
        const password = $('#new_password').val();
        const password_confirmation = $('#password_confirmation').val();

        if (code === '') {
            $('.invalid-code').show();
            return false;
        }
        if (password === '') {
            $('.invalid-password').show();
            return false;
        }

        if (password_confirmation === '' || password_confirmation !== password) {
            $('.invalid-confirm-password').show();
            return false;
        }

        if (email !== "") {
            $('#send2').html('');
            $('#send2').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                '<span class="ml-25 align-middle">{{__('Sending...')}}</span>');
            $.ajax({
                type: "POST",
                url: "{{route('reset')}}",
                data: {email: email, code: code, password: password, password_confirmation: password_confirmation},
                success: function (data) {
                    if (data.status === 1) {
                        swal.fire({
                            type: 'success',
                            title: data.message,
                            timer: 5000,
                            confirmButtonClass: 'btn btn-success',
                            buttonsStyling: true,
                            confirmButtonText: "ok"
                        });
                        $('#forgetPasswordModal').modal('hide');
                        $('#resetPasswordModal').modal('hide');
                        $(".modal-backdrop").remove();
                        //$('#loginModal').modal('show');
                        location.reload();
                    } else {
                        $('#error-alert').empty().append(data.message).show();

                    }
                },
                error: function (data) {
                    $('#send2').empty();
                    $('#send2').html('{{__('Send')}}');
                    if ("ar" === "ar") {
                        swal.fire({
                            type: 'warning',
                            title: "عذراً: حدث خطأ غير متوقع.. من فضلك حاول في وقت لاحق.",
                            timer: 4000
                        });
                    } else {
                        swal.fire({
                            type: 'warning',
                            title: "عذراً: حدث خطأ غير متوقع.. من فضلك حاول في وقت لاحق.",
                            timer: 4000
                        });
                    }
                    myHandel(response);
                },
                complete: function () {
                    //do nothing
                }
            });
        } else {
            return false;

        }

    };

    (function ($) {
        $.fn.inputFilter = function (inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };
    }(jQuery));

</script>
<!-- END: Body-->

</html>



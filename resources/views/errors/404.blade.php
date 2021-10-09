<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/animate/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">

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
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/animate/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/forms/form-validation.css')}}">

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
        #message{
            width:100%;
            margin:0 0px ;
            border:1px solid #ced4da;
            border-radius:3px;
            padding:7px;
            position: relative;
            top:2px;
            text-align: right;
        }
    </style>
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
        <div class="content-body mt-5 mb-5" style="margin-top: 14rem !important;">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="error-ghost text-center">
                                    <svg class="ghost" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="127.433px" height="132.743px" viewBox="0 0 127.433 132.743" enable-background="new 0 0 127.433 132.743" xml:space="preserve">
                                            <path fill="#096d3e" d="M116.223,125.064c1.032-1.183,1.323-2.73,1.391-3.747V54.76c0,0-4.625-34.875-36.125-44.375
                                            s-66,6.625-72.125,44l-0.781,63.219c0.062,4.197,1.105,6.177,1.808,7.006c1.94,1.811,5.408,3.465,10.099-0.6
                                            c7.5-6.5,8.375-10,12.75-6.875s5.875,9.75,13.625,9.25s12.75-9,13.75-9.625s4.375-1.875,7,1.25s5.375,8.25,12.875,7.875
                                            s12.625-8.375,12.625-8.375s2.25-3.875,7.25,0.375s7.625,9.75,14.375,8.125C114.739,126.01,115.412,125.902,116.223,125.064z"></path>
                                        <circle fill="#000000" cx="86.238" cy="57.885" r="6.667"></circle>
                                        <circle fill="#000000" cx="40.072" cy="57.885" r="6.667"></circle>
                                        <path fill="#000000" d="M71.916,62.782c0.05-1.108-0.809-2.046-1.917-2.095c-0.673-0.03-1.28,0.279-1.667,0.771
                                            c-0.758,0.766-2.483,2.235-4.696,2.358c-1.696,0.094-3.438-0.625-5.191-2.137c-0.003-0.003-0.007-0.006-0.011-0.009l0.002,0.005
                                            c-0.332-0.294-0.757-0.488-1.235-0.509c-1.108-0.049-2.046,0.809-2.095,1.917c-0.032,0.724,0.327,1.37,0.887,1.749
                                            c-0.001,0-0.002-0.001-0.003-0.001c2.221,1.871,4.536,2.88,6.912,2.986c0.333,0.014,0.67,0.012,1.007-0.01
                                            c3.163-0.191,5.572-1.942,6.888-3.166l0.452-0.453c0.021-0.019,0.04-0.041,0.06-0.061l0.034-0.034
                                            c-0.007,0.007-0.015,0.014-0.021,0.02C71.666,63.771,71.892,63.307,71.916,62.782z"></path>
                                        <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="18.614" cy="99.426" r="3.292"></circle>
                                        <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="95.364" cy="28.676" r="3.291"></circle>
                                        <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="24.739" cy="93.551" r="2.667"></circle>
                                        <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="101.489" cy="33.051" r="2.666"></circle>
                                        <circle fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" cx="18.738" cy="87.717" r="2.833"></circle>
                                        <path fill="#FCEFED" stroke="#FEEBE6" stroke-miterlimit="10" d="M116.279,55.814c-0.021-0.286-2.323-28.744-30.221-41.012
                                            c-7.806-3.433-15.777-5.173-23.691-5.173c-16.889,0-30.283,7.783-37.187,15.067c-9.229,9.736-13.84,26.712-14.191,30.259
                                            l-0.748,62.332c0.149,2.133,1.389,6.167,5.019,6.167c1.891,0,4.074-1.083,6.672-3.311c4.96-4.251,7.424-6.295,9.226-6.295
                                            c1.339,0,2.712,1.213,5.102,3.762c4.121,4.396,7.461,6.355,10.833,6.355c2.713,0,5.311-1.296,7.942-3.962
                                            c3.104-3.145,5.701-5.239,8.285-5.239c2.116,0,4.441,1.421,7.317,4.473c2.638,2.8,5.674,4.219,9.022,4.219
                                            c4.835,0,8.991-2.959,11.27-5.728l0.086-0.104c1.809-2.2,3.237-3.938,5.312-3.938c2.208,0,5.271,1.942,9.359,5.936
                                            c0.54,0.743,3.552,4.674,6.86,4.674c1.37,0,2.559-0.65,3.531-1.932l0.203-0.268L116.279,55.814z M114.281,121.405
                                            c-0.526,0.599-1.096,0.891-1.734,0.891c-2.053,0-4.51-2.82-5.283-3.907l-0.116-0.136c-4.638-4.541-7.975-6.566-10.82-6.566
                                            c-3.021,0-4.884,2.267-6.857,4.667l-0.086,0.104c-1.896,2.307-5.582,4.999-9.725,4.999c-2.775,0-5.322-1.208-7.567-3.59
                                            c-3.325-3.528-6.03-5.102-8.772-5.102c-3.278,0-6.251,2.332-9.708,5.835c-2.236,2.265-4.368,3.366-6.518,3.366
                                            c-2.772,0-5.664-1.765-9.374-5.723c-2.488-2.654-4.29-4.395-6.561-4.395c-2.515,0-5.045,2.077-10.527,6.777
                                            c-2.727,2.337-4.426,2.828-5.37,2.828c-2.662,0-3.017-4.225-3.021-4.225l0.745-62.163c0.332-3.321,4.767-19.625,13.647-28.995
                                            c3.893-4.106,10.387-8.632,18.602-11.504c-0.458,0.503-0.744,1.165-0.744,1.898c0,1.565,1.269,2.833,2.833,2.833
                                            c1.564,0,2.833-1.269,2.833-2.833c0-1.355-0.954-2.485-2.226-2.764c4.419-1.285,9.269-2.074,14.437-2.074
                                            c7.636,0,15.336,1.684,22.887,5.004c26.766,11.771,29.011,39.047,29.027,39.251V121.405z"></path>
                                        </svg>
                                </div>

                                <div class="text-center">
                                    <h3 class="mt-4">{{__('Page not found 404')}}</h3>
                                    <p class="text-muted mb-0">{{__('Please send an accurate description to help us solve this problem')}}</p>




                                </div>

                            </div> <!-- end card-body -->
                            <div class="text-center mb-4" >
                                <form class="form-inline"  method="POST" >
                                    <input type="hidden" name="errorCode" value="{{$exception->getStatusCode()}}">
                                    <input type="hidden" name="url" value="{{url()->current()}}">
                                    <div class="col-8">
                                        <input autofocus="" style="" name="message" class="form-control" id="message" placeholder="{{__('Write to us the details of the problem')}}" required="">
                                    </div>

                                    <div class="col-4">
                                        <button class="btn btn-success" style="width: 100%" id="send" type="button"> {{__('Send')}}
                                        </button>
                                    </div>
                                </form>


                            </div>

                        </div>
                        <!-- end card -->



                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->


<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->

<!-- END: Page JS-->

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
</script>
<script>
    $(document).ready(function() {
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

        $(document).on("click", "#send", function() {
            var $form = $(this.form);
            if(! $form.valid()) {
                return false
            };
            if ($form.valid()) {
                $.ajaxSetup({
                    headers: {
                        // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#send').html('');
                $('#send').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                    '<span class="ml-25 align-middle">{{__('Sending')}}...</span>');
                $.ajax({
                    url: "{{route('error.store')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#send').empty();
                        $('#send').html('{{__('Send')}}');

                        setTimeout(function () {
                            toastr['success'](
                                response.message,
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 200);
                        console.log(history.go(-1))
                        {{--window.location.href = '{{url()->previous()}}';--}}
                        // document.getElementById("editData").reset();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#send').empty();
                        $('#send').html('{{__('Send')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof (response.responseJSON) != "undefined") {
                                myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 200);
                            }
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                    }
                });
            }
        });

    });

</script>
</body>
<!-- END: Body-->

</html>



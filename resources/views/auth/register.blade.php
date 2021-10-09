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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="{{asset('/photo/favicon/apple-icon-120x120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/photo/favicon/favicon.ico')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" href="{{asset('/photo/favicon/manifest.json')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />

@if(App::isLocale('en'))
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/swiper.min.css')}}">
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
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-wizard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-swiper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/pages/page-auth.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
        <style>
            .auth-wrapper.auth-v2 .brand-logo {
                position: absolute;
                top: 2rem;
                right: 2rem;
                left: unset;
                margin: 0;
                z-index: 1;
            }
            .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
                width: 30px;
                /* height: 8px; */
                border-radius: 30px;
                border: 2px solid #fff;
                background: #fff;
            }
            .danger{
                border-radius:35px;
                -moz-border-radius: 35px;
                -webkit-border-radius: 35px;
                color:white;
                background-color: #f65158;
                padding: 8px;
                font-size: 11px
            }
            .success{
                border-radius:35px;
                -moz-border-radius: 35px;
                -webkit-border-radius: 35px;
                color:white;
                background-color: #096d3e;
                padding: 8px;
                font-size: 11px;
                position: absolute;
                top: 28px;
                right: 23px;
            }

        </style>
    @else

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/swiper.min.css')}}">
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
            <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-wizard.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-swiper.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/pages/page-auth.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

            <style>
                .auth-wrapper.auth-v2 .brand-logo {
                    position: absolute;
                    top: 2rem;
                    right: unset;
                    left: 2rem;
                    margin: 0;
                    z-index: 1;
                }
                .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
                    width: 30px;
                    /* height: 8px; */
                    border-radius: 30px;
                    border: 2px solid #fff;
                    background: #fff;
                }
                .danger{
                    border-radius:35px;
                    -moz-border-radius: 35px;
                    -webkit-border-radius: 35px;
                    color:white;
                    background-color: #f65158;
                    padding: 8px;
                    font-size: 11px
                }
                .success{
                    border-radius:35px;
                    -moz-border-radius: 35px;
                    -webkit-border-radius: 35px;
                    color:white;
                    background-color: #096d3e;
                    padding: 8px;
                    font-size: 11px;
                    position: absolute;
                    top: 28px;
                    left: 23px;
                }
                .step {
                    margin-left: 90px !important;
                    margin-right: 90px !important;
                }
                .bs-stepper .bs-stepper-header .step:first-child .step-trigger {
                    padding-left: 1.75rem !important;
                    padding-right: 0 !important;
                }
            </style>
    @endif
    <style>
        .select2-container--classic .select2-results__option[aria-selected='true'], .select2-container--default .select2-results__option[aria-selected='true'] {
            background-color: #0e7042 !important;
            color: white !important;
        }
        .form-control:focus {
            border-color: #0e7042;
        }
        .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before, .custom-radio .custom-control-input:checked ~ .custom-control-label::before {
            box-shadow: 0 2px 4px 0 rgb(14 112 66)  !important;
        }
        .custom-control-input:checked ~ .custom-control-label::before {
            color: #FFFFFF;
            border-color: #0e7042;
            background-color: #0e7042;
        }
        .bs-stepper .bs-stepper-header {
            padding: 0.5rem 0.5rem;
            position: relative;
            z-index: 1;
        }

        .bs-stepper-header:before {
            top: 53px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #eee;
            z-index: 0;
        }
        .btn-success {
            border-color: #096d3e !important;
            background-color: #096d3e !important;
            color: #FFFFFF !important;
        }
        .select2-container--classic.select2-container--open .select2-selection--single, .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #096d3e !important;
            outline: 0;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #5897fb;
            color: white;
        }
        .select2-container--classic .select2-results__option--highlighted, .select2-container--default .select2-results__option--highlighted {
            background-color: rgba(115, 103, 240, 0.12) !important;
            color: #096d3e !important;
        }
        .flag-icon {
            margin-left: 10px;
            margin-right: 10px;
            width: 1.5em !important;
            height: 1em;
        }
        .step{
            margin-left: 50px;
            margin-right: 50px;
        }
        .content-header h5{
            color:#096d3e ;
        }
        .custom-control-input:not(:disabled):active ~ .custom-control-label::before {
            background-color: #096d3e;
            border-color: #096d3e;
        }
        .select2-container--classic .select2-selection--single:focus, .select2-container--default .select2-selection--single:focus {
            outline: 0;
            border-color: #096d3e !important;
            box-shadow: 0 3px 10px 0 rgb(34 41 47 / 10%) !important;
        }
        .bs-stepper .bs-stepper-header {

             border-bottom: unset;

        }
        .error_span{
            border-radius: 35px;
            -moz-border-radius: 35px;
            -webkit-border-radius: 35px;
            color: white;
            background-color: #f65158;
            padding: 8px;
            font-size: 11px;
            position: absolute;
            top: 28px;
            left: 23px;
        }
        .bs-stepper .step-trigger.disabled, .bs-stepper .step-trigger:disabled {
            pointer-events: none;
             opacity: unset;
        }
    </style>
    <!-- END: Custom CSS-->

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
                    <!-- Brand logo--><a class="brand-logo" href="{{url('/')}}">
                        <img style="width: 140px" src="{{asset('/looz/loozLandingPage/img/logo_black.png')}}" alt="">
{{--                        <h2 class="brand-text text-primary ml-1">{{config('app.name')}}</h2>--}}
                    </a>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class=" col-md-6 col-lg-6 " >
                        <div class=" d-lg-flex align-items-center justify-content-center " style="height: 100vh;position: fixed;width: 50% !important; " >
                            <!-- pagination swiper -->
                            <section id="component-swiper-pagination" style="width: 100%; height: 100%">
                                <div class="card h-100">

                                    <div class="card-body h-100 p-0">
                                        <div class="swiper-paginations swiper-container h-100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    @if(App::isLocale('en'))
                                                        <img class="img-fluid h-100 w-100" src="{{asset('/photo/slider1_en.jpg')}}" alt="banner" />
                                                    @else
                                                        <img class="img-fluid h-100 w-100" src="{{asset('/photo/slider1.jpg')}}" alt="banner" />
                                                    @endif

                                                </div>
                                                <div class="swiper-slide">
                                                    @if(App::isLocale('en'))
                                                        <img class="img-fluid h-100 w-100" src="{{asset('/photo/slider2 english.png')}}" alt="banner" />
                                                    @else
                                                        <img class="img-fluid h-100 w-100" src="{{asset('/photo/slider2.jpg')}}" alt="banner" />
                                                    @endif

                                                </div>
                                            </div>
                                            <!-- Add Pagination -->
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!--/ pagination swiper -->
                        </div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Register-->
                    <div class="d-flex col-lg-6 align-items-center auth-bg px-2 ">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <!-- Horizontal Wizard -->
                            <section class="horizontal-wizard">
                                <div class="text-center ">
                                    <h2 style="margin:15% 0 5% 0;color: #096d3e;font-weight: bolder;"> {{__('Get started in two steps')}} </h2>
                                </div>
                                <div class="bs-stepper horizontal-wizard-example">
                                    <div class="bs-stepper-header justify-content-center">
                                        <div class="step" data-target="#account-details">
                                            <button type="button" class="step-trigger">
                                                <img src="{{asset('/photo/7-1.png')}}" width="70">
                                            </button>
                                        </div>

                                        <div class="step" data-target="#personal-info">
                                            <button type="button" class="step-trigger">
                                                <img src="{{asset('/photo/7-2.png')}}" width="70">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <div id="account-details" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">{{__('Account Details')}}</h5>
{{--                                                <small class="text-muted">{{__('Enter Your Account Details.')}}</small>--}}
                                            </div>
                                            <form  >
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="owner_name">{{__('Full Name')}}</label>
                                                        <input type="text"  autocomplete="new-owner_name" name="owner_name" id="owner_name" class="form-control" placeholder="{{__('Ahmed Ali')}}" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="email">{{__('Email')}}</label>
                                                        <input type="email" autocomplete="new-email" name="email" id="email" class="form-control" placeholder="ahmed.ali@email.com" aria-label="john.doe" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group form-password-toggle col-md-6">
                                                        <label class="form-label" for="password">{{__('Password')}}</label>
                                                        <input type="password" autocomplete="new-password" name="password" id="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    </div>
                                                    <div class="form-group form-password-toggle col-md-6">
                                                        <label class="form-label" for="confirm-password">{{__('Confirm Password')}}</label>
                                                        <input type="password" autocomplete="new-confirm-password" name="confirm-password" id="confirm-password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="mobile">{{__('Mobile')}}</label>
                                                        <input type="number" autocomplete="new-mobile" name="mobile" id="mobile" class="form-control" placeholder="592555309" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="country">{{__('Country')}}</label>
                                                        <select class="select2 w-100" name="country_id" id="country_id">
{{--                                                            <option label=" "></option>--}}
{{--                                                            <option selected>--}}
{{--                                                                UK <img src="../uploads/countries/1.png" >--}}
{{--                                                            </option>--}}

                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-success btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">{{__('Next')}}</span>
                                                    @if(App::isLocale('en'))
                                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                                    @else
                                                        <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
                                                    @endif

                                                </button>
                                            </div>
                                        </div>
                                        <div id="personal-info" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">{{__('Personal Info')}}</h5>
{{--                                                <small>{{__('Enter Your Personal Info.')}}</small>--}}
                                            </div>
                                            <form>
                                                <div class="row">
{{--                                                    <div class="form-group col-md-12">--}}
{{--                                                        <label class="form-label" for="user_name">{{__('Market Name')}}</label>--}}
{{--                                                        <input type="text" name="user_name" id="user_name"  class="form-control mb-1" placeholder="{{__('Market Name En')}}" />--}}
{{--                                                        <span id="linkHint" class=" order-last linkHint" style="display: block">--}}
{{--                                                                    {{__('Incorrect store name format')}}--}}

{{--                                                                <span class=" order-last linkHint1" style="display: block">--}}
{{--                                                                <span style="color:gray;font-size: 13px">--}}
{{--                                                                    <span class="fa fa-globe"></span>--}}
{{--                                                                    {{__('Your store link is as follows')}} :market.lozcart.com/en/{{__('Market Name')}}</span>--}}
{{--                                                                </span>--}}
{{--                                                        </span>--}}

{{--                                                    </div>--}}
                                                    <div class="form-group col-md-12">
                                                        <label class="form-label" for="user_name">{{__('Market Name')}}</label>
                                                        <input
                                                               type="text" class="form-control" required id="link"
                                                               name="user_name" value=""
                                                               placeholder="{{__('Market Name En')}}">
                                                        <span id="linkHint" class=" order-last linkHint"
                                                              style="display: none">  {{__('Incorrect store name format')}}   </span>
                                                        <span class=" order-last linkHint1"
                                                              style="display: block">
                                                <span style="color:gray;font-size: 13px">
                                                     {{__('Your store link is as follows')}} :market.lozcart.com/en/yourStore </span>
                                                </span>
                                                        <span id="unique-error"
                                                              class="invalid-feedback order-last next_step step_two_inputs">  {{__('Store name is required')}}   </span>
                                                        <span id="unique-error1"
                                                              class="invalid-feedback order-last next_step step_two_inputs"> {{__('Store name must be at least 3 characters long')}}    </span>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="market_name">{{__('Market Name En')}}</label>
                                                        <input type="text" name="market_name" id="market_name" class="form-control" placeholder="Dream Market" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="market_name_ar">{{__('Market Name Ar')}}</label>
                                                        <input type="text" name="market_name_ar" id="market_name_ar" class="form-control" placeholder="متجر الاحلام" />
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-md-12">
                                                        <label class="form-label mr-2" for="have_trade">{{__('Has Trade')}}</label>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="male" name="have_trade" value="1" class="custom-control-input" checked />
                                                            <label class="custom-control-label" for="male">{{__('Yes')}}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="female" name="have_trade" value="0" class="custom-control-input"  />
                                                            <label class="custom-control-label" for="female">{{__('No')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
{{--                                                        <label class="form-label" for="registration_source">{{__('How did you hear about LozCart')}}</label>--}}

                                                        <select class="select2 w-100" name="registration_source" id="registration_source">
                                                            <option ></option>
                                                            <option value="search_engines">البحث في جوجل</option>
                                                            <option value="twitter">تويتر</option>
                                                            <option value="instagram">انستقرام</option>
                                                            <option value="snapchat">سناب شات</option>
                                                            <option value="youtube">يوتيوب</option>
                                                            <option value="whatsapp">واتساب</option>
                                                            <option value="friend">صديق</option>
                                                            <option value="other">أخرى</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-success btn-prev">
                                                    @if(App::isLocale('en'))
                                                        <i data-feather="arrow-left" class="align-middle ml-sm-25 ml-0"></i>
                                                    @else
                                                        <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                                    @endif

                                                    <span class="align-middle d-sm-inline-block d-none">{{__('Previous')}}</span>
                                                </button>
                                                <button id="add_form" class="btn btn-success btn-submit">{{__('Submit')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <div class="text-center p-t-30">
                                <h5 style="font-weight: normal;"> {{__('You have an account with LozCart')}} <a href="{{ route('login') }}" style="color: #096d3e">
                                    {{__('Login')}} </a></h5>
                            </div>
                            <div class="text-center shroot">
                                <label style="; font-weight: normal;font-size: 14px">
                                    {{__('By creating the account you agree to')}}
                                    <a href="http://lozcart.com/terms" target="_blank" tabindex="0" style="color: #096d3e">{{__('Terms and Conditions')}}</a>
                                    {{__('and')}}
                                    <a href="http://lozcart.com/privacy" target="_blank" tabindex="0" style="color: #096d3e">{{__('Privacy policy')}}</a>
                                </label>
                            </div>
                            <!-- /Horizontal Wizard -->
                        </div>
                    </div>
                    <!-- /Register-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('/app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

<!-- BEGIN: Page JS-->
<!-- BEGIN: Page JS-->
<script src="{{asset('/app-assets/js/scripts/forms/form-wizard.js')}}"></script>
<script src="{{asset('/app-assets/js/scripts/extensions/ext-component-swiper.js')}}"></script>
<!-- END: Page JS-->
{{--<script src="{{asset('')}}/app-assets/js/scripts/pages/page-auth-register.js"></script>--}}
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
    var horizontalWizard = document.querySelector('.horizontal-wizard-example')
    // Horizontal Wizard
    // --------------------------------------------------------------------
    if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
        var numberedStepper = new Stepper(horizontalWizard),
            $form = $(horizontalWizard).find('form');
        $form.each(function () {
            var $this = $(this);
            $this.validate({
                rules: {
                    owner_name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 9
                    },
                    'confirm-password': {
                        required: true,
                        equalTo: '#password'
                    },
                    country_id: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        minlength: 10
                    },
                    user_name: {
                        required: true
                    },
                    market_name: {
                        required: true
                    },
                    market_name_ar: {
                        required: true
                    },

                    registration_source: {
                        required: true
                    }
                }
            });
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

        $(horizontalWizard)
            .find('.btn-next')
            .each(function () {
                $(this).on('click', function (e) {
                    var isValid = $(this).parent().siblings('form').valid();
                    if (isValid) {
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
                                    var error_message = '<span class="custom-error error">' + obj.messages[name][0] + '</span>'
                                    parent.addClass('error')
                                    parent.append(error_message);

                                }
                            });
                        }

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }

                            });
                            var email = document.getElementById('email').value;
                            var mobile = document.getElementById('mobile').value;
                            var token = $('meta[name="csrf-token"]').attr('content');
                            // var idRow = document.getElementById("user_row_" + id)

                            $.ajax({
                            url: "{{ url("checkEmailMobile")}}",
                            type: "POST",
                            data: {
                                email: email,
                                mobile: mobile,
                            _token: token,

                        },
                            success: function (response) {
                                numberedStepper.next();
                                $('.custom-error.error').remove();
                        },
                                error: function (data) {
                                    $('.custom-error').remove();
                                    $('#add_form').empty();
                                    $('#add_form').html('{{__('Save')}}');
                                    var response = data.responseJSON;
                                    if (data.status == 422) {
                                        if (typeof(response.responseJSON) != "undefined") {
                                            myHandel(response);

                                        }
                                    } else {

                                    }
                                }
                        });
                        } else {
                        e.preventDefault();
                    }
                });
            });

        $(horizontalWizard)
            .find('.btn-prev')
            .on('click', function () {
                numberedStepper.previous();
            });

        $(horizontalWizard)
            .find('.btn-submit')
            .on('click', function () {
                var Form2IsValid = true;
                var link = $('#link');
                var linkHint = $('#linkHint');
                var linkHint1 = $('.linkHint1');
                if ($.trim(link.val()).length === 0) {
                    Form2IsValid = false;
                    $('#unique-error').show();
                    $('#unique-error1').hide();
                    linkHint1.hide();
                    linkHint.hide();
                } else if ($.trim(link.val()).length < 3) {
                    Form2IsValid = false;
                    $('#unique-error').hide();
                    $('#unique-error1').show();
                    linkHint1.hide();
                    linkHint.hide();
                }else {
                var isValid = $(this).parent().siblings('form').valid();
                if (isValid) {
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
                                var error_message = '<span class="error">' + obj.messages[name][0] + '</span>'
                                parent.addClass('error')
                                parent.append(error_message);

                            }
                        });
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var owner_name = document.getElementById('owner_name').value;
                    var email = document.getElementById('email').value;
                    var password = document.getElementById('password').value;
                    var mobile = document.getElementById('mobile').value;
                    var country_id = document.getElementById('country_id').value;
                    var user_name = document.getElementById('link').value;
                    var market_name = document.getElementById('market_name').value;
                    var market_name_ar = document.getElementById('market_name_ar').value;
                    var have_trade = $('input[name="have_trade"]:checked').val();
                    var registration_source = document.getElementById('registration_source').value;
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $('#add_form').html('');
                    $('#add_form').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                        '<span class="ml-25 align-middle">{{__('Creating your store')}}...</span>');
                    $.ajax({
                        url: "{{ route('register') }}",
                        type: "POST",
                        data: {
                            owner_name: owner_name,
                            email: email,
                            mobile: mobile,
                            password: password,
                            country_id: country_id,
                            user_name: user_name,
                            market_name: market_name,
                            market_name_ar: market_name_ar,
                            have_trade: have_trade,
                            registration_source: registration_source,
                            _token: token,

                        },
                        success: function (data) {
                            $('#add_form').empty();
                            $('#add_form').html('{{__('Submit')}}');
                            window.location.href = "{{route('dashboard')}}";
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#add_form').empty();
                            $('#add_form').html('{{__('Submit')}}');
                            var response = data.responseJSON;
                            if (data.status == 422) {
                                if (typeof(response.responseJSON) != "undefined") {
                                    myHandel(response);

                                }
                            } else {

                            }
                        }
                    });
                }
                }
            });
    }

</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        var isoCountries = [
                @foreach($countries as $country)
                {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
            { id: {{ $country->id}},  flag: "{{$country->flag}}", text: '{{ $country->name}}',key:'{{ $country->key}}' },
            // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
            @endforeach
        ];

        function formatCountry(country) {
            if (!country.id) { return country.text; }
            var $country = $(
                '<img class=" flag-icon flag-icon-squared" src="http://lozcart.com/admin/public/uploads/countries/'+country.flag+'"/>'+
                // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                '<span class="flag-text">' + country.key + '</span>'
            );
            return $country;
        };
        function formatState2 (country) {
            if (!country.id) {
                return country.text;
            }
            // var baseUrl = 'https://mapp.sa';
            var $country = $(
                '<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+
                // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                '<span class="flag-text">' + country.key + '</span>'
            );
            return $country;

        };
        $("[name='country_id']").select2({
            placeholder: "Please Select a country",
            templateResult: formatCountry,
            templateSelection:formatState2,
            data: isoCountries
        });

        $('#CountryOfBirth').on('change', function () {
            console.log($(this).val())
        })
    });
</script>
<script>
    $(document).ready(function() {
         $('#registration_source').select2({
            placeholder: "{{__('How did you hear about LozCart')}}",
            allowClear: false
        });
    });

</script>
<script>
    $(document).ready(function() {

        // $form = $('#form_data');
//             $(function () {
//                 'use strict';
//
//                 var addLozcart = $('#add_lozcart');
// // console.log(addClient)
//                 // jQuery Validation
//                 // --------------------------------------------------------------------
//                 if (addLozcart.length) {
//                     addLozcart.validate({
//
//                         // rules: {
//                         //     'street_address': {
//                         //         required: true,
//                         //     },
//                         //     'email': {
//                         //         required: true,
//                         //         email: true
//                         //     },
//                         //     password: {
//                         //         required: true,
//                         //         minlength: 9
//                         //     },
//                         //     'password_confirmation': {
//                         //         required: true,
//                         //         equalTo: '#password'
//                         //     },
//                         //     country_id: {
//                         //         required: true
//                         //     },
//                         //     mobile: {
//                         //         required: true,
//                         //         minlength: 10
//                         //     },
//                         //
//                         // }
//                     });
//                 }
//             });

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
    //var linkRegex = new RegExp("^[0-9A-Za-z.]+$");
    //var linkRegex = new RegExp("^(\\w){1,15}$");
    //    var linkRegex = new RegExp("
    //    ");

    var link = $('#link');
    var linkHint = $('#linkHint');
    var linkHint1 = $('.linkHint1');
    link.on('input', function (e) {
        //validate link
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
        e.preventDefault();
        var link = $(this).val();
        var link_value = $.trim($(this).val()).length;
        if (link_value === 0) {
            $('#unique-error').show();
            $('#unique-error1').hide();
            linkHint1.hide();
            linkHint.hide();
        } else if (link_value < 3) {
            $('#unique-error').hide();
            $('#unique-error1').show();
            linkHint1.hide();
            linkHint.hide();
        } else {
            $.ajax({
                type: "POST",
                url: "{{ url("checkLink")}}",
                data: {link: link},
                success: function (data) {
                    $('#unique-error').hide();
                    $('#unique-error1').hide();
                    if (data.status === 0) {
                        var messages = "<span class='error_span' ><span class='fa fa-times-circle'></span> ";
                        $.each(data.errors, function (i, error) {
                            messages += error + '';
                        });
                        messages += '</span>';
                        linkHint.html(messages);
                        linkHint1.hide();
                    } else {


                        linkHint.css('background', 'transparent!important;');
                        if (data.success === "") {
                            linkHint.html('');
                            linkHint1.show();
                        } else {
                            linkHint.html(data.success + '<span style="color:gray;font-size: 13px">{{__('Your store link is as follows')}} :' + 'https://' + "market.lozcart.com/en" + '/' + link + '</span>');
                            linkHint1.hide();
                        }
                    }
                },
                error: function (data) {
                    linkHint.show();
                    linkHint.html('{{__('Sorry: an unexpected error occurred, try another time.')}}');
                },
                complete: function () {
                    linkHint.show();
                }
            });
        }
    });

</script>
<script>
    $(document).ready(function () {
        $('.alert-danger').fadeOut(6000);
        $('#mobile').inputFilter(function (value) {
            return /^\d*$/.test(value);    // Allow digits only, using a RegExp
        });

        $('#link').inputFilter(function (value) {
            return /^[0-9a-zA-Z._]*$/.test(value);    // Allow digits only, using a RegExp
        });
    });

    // Restricts input for the set of matched elements to the given inputFilter function.
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

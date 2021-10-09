<!DOCTYPE html>
@if(App::IsLocale('en'))
<html class="loading" lang="en" data-textdirection="ltr">
@else
<html class="loading" lang="ar" data-textdirection="rtl">
@endif
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
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

    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/animate/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />

        <!-- END: Vendor CSS-->
    @yield('style')
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
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">

        <!-- END: Page CSS-->
        <style>
            .main-menu-content > ul > li > a img {
                margin: 0 10px 0 3px;
                max-width: 17px;
                vertical-align: middle;
                border-style: none;
            }
            fieldset {
                border: 1px solid #bebfbe;
                padding-left: 26px;
                border-radius: 25px;
            }

            legend {
                padding: 0.2em 0.5em;
                border: 1px solid black;
                color: #2f312f;
                font-size: 90%;
                width: 43%;
                text-align: left;
                border-radius: 25px;
            }

            .box_permission ul{
                list-style: none;
                padding-left: 5%;
            }
            .parent{
                font-size: 16px;
                color: black;
                font-weight: bold;
                margin-bottom: 2%;
                display: flex;
                align-items: center;
            }
            .child{
                display: flex;
                align-items: center;
                margin-right: 10%;
            }
            .checkAll{
                margin-left: 20%;
                display: flex;
            }
            .checkAll label{
                margin-bottom: unset;
            }
        </style>

        <style>
            fieldset {
                border: 1px solid #bebfbe;
                padding-left: 26px;
                border-radius: 25px;
            }

            legend {
                padding: 0.2em 0.5em;
                border: 1px solid black;
                color: #2f312f;
                font-size: 90%;
                width: 43%;
                text-align: left;
                border-radius: 25px;
            }

            .box_permission ul{
                list-style: none;
                padding-left: 5%;
            }
            .parent{
                font-size: 16px;
                color: black;
                font-weight: bold;
                margin-bottom: 2%;
                display: flex;
                align-items: center;
            }
            .child{
                display: flex;
                align-items: center;
                margin-right: 10%;
            }
        </style>
        <style>
            .dt-buttons{
                margin-top: 1.4rem;
                margin-bottom: 0.5rem;
            }
            .delete_all{
                padding: 0;
                background-color: unset !important;
                border: unset;
                font-weight: 400;
                color: #6c757d !important;
                text-align: inherit;
                white-space: nowrap;
            }
            .btn_header{
                padding: 0;
                background-color: unset !important;
                border: unset;
                font-weight: 400;
                color: #6c757d !important;
                text-align: inherit;
                white-space: nowrap;
            }
            .btn_header:focus, .btn_header:active, .btn_header.active {
                color: #FFFFFF;
                background-color: #24b26303 !important;
            }.delete_all:focus, .delete_all:active, .delete_all.active {
                color: #FFFFFF;
                background-color: #24b26303 !important;
            }

        </style>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">

    <!-- END: Custom CSS-->
    @else
    <!-- BEGIN: Vendor CSS-->
        <style>
            @font-face {
                font-family: sst-arabic-roman;
                src: url({{asset('assets/fonts/sst-arabic-roman.ttf')}});
            }
            .navigation{
                font-family: 'sst-arabic-roman', sans-serif;
            }.header-navbar{
                font-family: 'sst-arabic-roman', sans-serif !important;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/vendors-rtl.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/toastr.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/animate/animate.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
        <!-- END: Vendor CSS-->
    @yield('style')
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/themes/dark-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/themes/bordered-layout.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/themes/semi-dark-layout.css')}}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style-rtl.css')}}">
        <!-- END: Custom CSS-->
        <style>
            body{
                direction: rtl;
                font-family: 'sst-arabic-roman', sans-serif;

            }
            .navigation{
                font-family: 'sst-arabic-roman', sans-serif;
            }
            .select2-container .select2-selection--single .select2-selection__rendered {

                padding-right: 8px;
                padding-left: 20px;

            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {

                right:unset;
                left: 1px;

            }
            select.form-control:not([multiple='multiple']) {
                background-image: url(data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%23d8d6de\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\' class=\'feather feather-chevron-down\'%3E%3Cpolyline points=\'6 9 12 15 18 9\'%3E%3C/polyline%3E%3C/svg%3E);
                background-position: calc(100% - (100% - 12px)) 13px, calc(100% - (100% - 20px)) 13px, 0 0;
                background-size: 18px 14px, 18px 14px;
                background-repeat: no-repeat;
                -webkit-appearance: none;
                -moz-appearance: none;
                padding-left: 4rem;
            }
        </style>
        <style>
            .dt-buttons{
                margin-top: 1.4rem;
                margin-bottom: 0.5rem;
            }
            /*#tidio-chat-iframe{*/
            /*    left:0 !important;*/
            /*    right:unset !important;*/
            /*}*/
            #tidio-chat-iframe  .awesome-iframe .widget-position-right.bubbleWithLabel .widgetLabel {
                left: 91px;
            }
            #tidio-chat-iframe #button {

                right: unset !important;
                left: 0 !important;
            }
        </style>
    @endif

<style>
    .main-menu .shadow-bottom {
        background: -webkit-linear-gradient(top, #283046 44%, rgba(40, 48, 70, 0.51) 73%, rgba(40, 48, 70, 0));
        background: linear-gradient(
            180deg
            , #283046 44%, rgba(40, 48, 70, 0.51) 73%, rgba(40, 48, 70, 0));
    }
    .main-menu.menu-dark .navigation > li ul .active {
        background: -webkit-linear-gradient(
            208deg
            , #096d3e, rgb(9 109 62));
        background: linear-gradient(
            -118deg
            , #096d3e, rgb(9 109 62));
        box-shadow: 0 0 10px 1px rgb(9 109 62);
        border-radius: 4px;
        z-index: 1;
    }
    .logo {
        border-radius: 16px;
        max-width: 60px;
        width: 60px;
        height: 60px;
        padding: 0px;
        display: inline-block;
        background: #ffffff00;
        border: 1px solid #ffffff00;
        overflow: hidden;
        margin-left: 15px;
        margin-right: 15px;
    }
.logo img{
    width: 100%;
}
    .app-search .form-control {
        border: none;
        height: 38px;
        padding-left: 20px;
        padding-right: 2.5rem !important;
        color: #fff;
        background-color: rgba(255, 255, 255, 0.07);
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 30px 0 0 30px;
    }
    .app-search .form-control {
        color: #323a46;
        background-color: #f1f5f7;
        border-color: #f1f5f7;
    }
     .app-search .form-control {
        border-radius: 0px 5px 5px 0px !important;
    }
   .app-search .select-input {
        position: relative;
    }

     .app-search .select-input {
        position: relative;
    }
    .app-search select.form-control {
        border-radius: 0 !important;
    }
    .main-menu .navbar-header .navbar-brand .brand-text {
        color: #096d3e;
    }
    .main-menu.menu-dark .navigation > li.active > a {
        background: -webkit-linear-gradient(
            208deg
            , #096d3e, rgb(9 109 62));
        background: linear-gradient(
            -118deg
            , #096d3e, rgb(9 109 62));
        box-shadow: 0 0 10px 1px rgb(9 109 62);
        color: #FFFFFF;
        font-weight: 400;
        border-radius: 4px;
    }
    .btn-success {
        border-color: #096d3e !important;
        background-color: #096d3e !important;
        color: #FFFFFF !important;
    }
    .text-success {
        color: #096d3e !important;
    }
    .bg-purple {
        background-color: #096d3e;
        background: linear-gradient(to left, rgb(9 109 62) 0%, rgb(9 109 62) 90%);
        border-color: #096d3e;
        color: #fff !important;
    }
    .peity rect:nth-child(odd){
        fill: #096d3e;
    }

    .light-layout .main-menu-content .navigation-main li a {
        color: #D0D2D6 !important;
    }

    .navbar-header .menu-logo a img{

    }
    #DataTables_Table_0_wrapper{
        padding-left: 10px;
        padding-right: 10px;
    }
    a {
        color: #096d3e;
        text-decoration: none;
        background-color: transparent;
    }
    .page-item.active .page-link {
        z-index: 3;
        border-radius: 5rem;
        background-color: #096d3e;
        color: #FFFFFF !important;
        font-weight: 600;
    }
    .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before, .custom-radio .custom-control-input:checked ~ .custom-control-label::before {
        box-shadow: 0 2px 4px 0 rgb(9 109 62) !important;
    }
    .custom-control-input:checked ~ .custom-control-label::before {
        color: #FFFFFF;
        border-color: #096d3e;
        background-color: #096d3e;
    }
    .custom-switch-success .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #096d3e !important;
        color: #FFFFFF;
        -webkit-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }
    .nav-pills .nav-link.active {
        border-color: #096d3e;
        box-shadow: 0 4px 18px -4px rgb(9 109 62);
    }
    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        color: #FFFFFF;
        background-color: #096d3e;
    }
    .select2-container--classic .select2-results__option[aria-selected='true'], .select2-container--default .select2-results__option[aria-selected='true'] {
        background-color: #096d3e !important;
        color: white !important;
    }
    .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #096d3e !important;
        border-color: #096d3e !important;
        color: #FFFFFF;
        padding: 2px 5px;
    }
    .bg-gradient-success, .btn-gradient-success {
        color: #FFFFFF;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        background-image: -webkit-linear-gradient(
            137deg
            , #086a3d, #086c3d);
        background-image: linear-gradient(
            -47deg
            , #086c3d, #086c3d);
        background-repeat: repeat-x;
        background-repeat: repeat;
    }
    .dropzone .dz-message:before {

        color: #096d3e;

    }
    .modal .modal-header {
        background-color: #096d3e;
        border-bottom: none;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .modal-title {
        margin-bottom: 0;
        line-height: 1.45;
        color: #ffffff;
    }
    .main-menu.menu-light .navigation > li.active > a {
        background: -webkit-linear-gradient(
            332deg, #096d3e, rgb(9 109 62));
        background: linear-gradient(
            118deg, #096d3e, rgb(9 109 62));
        box-shadow: 0 0 10px 1px rgb(9 109 62);
        color: #FFFFFF;
        font-weight: 400;
        border-radius: 4px;
    }
    .delete_all{
        padding: 0;
        background-color: unset !important;
        border: unset;
        font-weight: 400;
        color: #6c757d !important;
        text-align: inherit;
        white-space: nowrap;
    }
    .btn_header{
        padding: 0;
        background-color: unset !important;
        border: unset;
        font-weight: 400;
        color: #6c757d !important;
        text-align: inherit;
        white-space: nowrap;
    }
    .btn_header:focus, .btn_header:active, .btn_header.active {
        color: #FFFFFF;
        background-color: #24b26303 !important;
    }
    .delete_all:focus, .delete_all:active, .delete_all.active {
        color: #FFFFFF;
        background-color: #24b26303 !important;
    }
    .custom-checkbox.custom-control, .custom-radio.custom-control {
        padding-right: 1.8rem;
        margin-bottom: 1rem !important;
    }
    .main-menu.menu-light .navigation > li ul .active {
        background: -webkit-linear-gradient(
            208deg
            , #096d3e, rgb(9 109 62));
        background: linear-gradient(
            -118deg
            , #096d3e, rgb(9 109 62));
        box-shadow: 0 0 10px 1px rgb(9 109 62);
        border-radius: 4px;
        z-index: 1;
    }
    /*.main-menu-content > ul > li > a img {*/
    /*    margin: 0 10px 0 0px;*/
    /*    max-width: 17px;*/
    /*    vertical-align: middle;*/
    /*    border-style: none;*/
    /*}*/
    .main-menu.menu-light .navigation > li.open:not(.menu-item-closing) > a, .main-menu.menu-light .navigation > li.sidebar-group-active > a {
        color: #565360;
        background: #f5f5f500;
        border-radius: 6px;
    }
    .custom-control-input:not(:disabled):active ~ .custom-control-label::before {
        background-color: #096d3e;
        border-color: #096d3e;
    }
    .modal.modal-success .modal-header .modal-title {
        color: #ffffff;
    }
    .custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
        background-color: rgb(9 109 62);
    }
    .form-control:focus {
        color: #6E6B7B;
        background-color: #FFFFFF;
        border-color: #096d3e;
        outline: 0;
        box-shadow: 0 3px 10px 0 rgb(34 41 47 / 10%);
    }
    .input-group:not(.bootstrap-touchspin):focus-within .form-control, .input-group:not(.bootstrap-touchspin):focus-within .input-group-text {
        border-color: #096d3e;
        box-shadow: none;
    }
    .select2-container--classic.select2-container--focus .select2-selection--multiple, .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #096d3e !important;
        outline: 0;
    }
    .select2-container--classic .select2-results__option--highlighted, .select2-container--default .select2-results__option--highlighted {
        background-color: rgba(115, 103, 240, 0.12) !important;
        color: #096d3e !important;
    }
    .dropzone {
        min-height: 350px;
        border: 2px dashed #096d3e;
        background: #F8F8F8;
        position: relative;
    }
    #tidio-chat-iframe{
        bottom:0 !important;
    }
    .nav-tabs .nav-link.active {
        position: relative;
        color: #096d3e;
    }
    .nav-tabs .nav-link:after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 3px;
        background: -webkit-linear-gradient(
            120deg
            , #096d3e, rgb(9 109 62)) !important;
        background: linear-gradient(
            -30deg
            , #096d3e, rgb(9 109 62)) !important;
        -webkit-transition: -webkit-transform 0.3s;
        transition: -webkit-transform 0.3s;
        transition: transform 0.3s;
        transition: transform 0.3s, -webkit-transform 0.3s;
        -webkit-transform: translate3d(0, 150%, 0);
        transform: translate3d(0, 150%, 0);
    }
</style>
    @if (App::isLocale('en'))
        <style>
            /*.main-menu-content > ul > li > a img {*/
            /*    margin: 0 10px 0 0px;*/
            /*    max-width: 17px;*/
            /*    vertical-align: middle;*/
            /*    border-style: none;*/
            /*}*/
            .navigation  .nav-item a img{
                height: 1.4285rem;
                width: 1.4285rem;
                font-size: 1.45rem;
                margin-right: 1.1rem;
                margin-left: 0;
                -webkit-flex-shrink: 0;
                -ms-flex-negative: 0;
                flex-shrink: 0;
            }
            .navigation .menu-logo a img {
                height: 100%;
                width: 100%;
                font-size: 1.45rem;
                margin-right: 1.1rem;
                margin-left: 0;
                -webkit-flex-shrink: 0;
                -ms-flex-negative: 0;
                flex-shrink: 0;
            }

            .main-menu.expanded .menu-logo .logo{
                position: unset;
                left: 10px;
            }
            .main-menu.expanded .menu-logo h4{
                position: unset;
                right: 0;
            }
            .menu-logo h4{
                position: absolute;
                right: 0;
            }
            .menu-logo .logo{
                position: absolute;
                left: -5px;
            }
        </style>
    @else
        <style>
            .navigation  .nav-item a img{
                height: 1.4285rem;
                width: 1.4285rem;
                font-size: 1.45rem;
                margin-left: 1.1rem;
                -webkit-flex-shrink: 0;
                -ms-flex-negative: 0;
                flex-shrink: 0;
            }
            .navigation .menu-logo a img {
                height: 100%;
                width: 100%;
                font-size: 1.45rem;
                margin-left: 1.1rem;
                -webkit-flex-shrink: 0;
                -ms-flex-negative: 0;
                flex-shrink: 0;
            }

            .main-menu.expanded .menu-logo .logo{
                position: unset;
                right: 10px;
            }
            .main-menu.expanded .menu-logo h4{
                position: unset;
                left: 0;
            }
            .menu-logo h4{
                position: absolute;
                left: 0;
            }
            .menu-logo .logo{
                position: absolute;
                right: -5px;
            }
        </style>
    @endif
    <style>
        body { display:none; }
        .loader {
            font-size: 10px;
            margin: 50px auto;
            text-indent: -9999em;
            width: 11em;
            height: 11em;
            border-radius: 50%;
            background: #004d40;
            background: -moz-linear-gradient(left, #004d40 10%, rgba(0,77,64, 0) 42%);
            background: -webkit-linear-gradient(left, #004d40 10%, rgba(0,77,64, 0) 42%);
            background: -o-linear-gradient(left, #004d40 10%, rgba(0,77,64, 0) 42%);
            background: -ms-linear-gradient(left, #004d40 10%, rgba(0,77,64, 0) 42%);
            background: linear-gradient(to right, #004d40 10%, rgba(0,77,64, 0) 42%);
            position: relative;
            -webkit-animation: load3 1.4s infinite linear;
            animation: load3 1.4s infinite linear;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
        }
        .loader:before {
            width: 50%;
            height: 50%;
            background: #004d40;
            border-radius: 100% 0 0 0;
            position: absolute;
            top: 0;
            left: 0;
            content: '';
        }
        .loader:after {
            background: #0dc5c1;
            width: 75%;
            height: 75%;
            border-radius: 50%;
            content: '';
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }
        @-webkit-keyframes load3 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes load3 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        html .pace .pace-progress {
            background: #096d3e;
        }
        .select2-container--classic.select2-container--open .select2-selection--single, .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #096d3e !important;
            outline: 0;
        }
        .select2-container--classic .select2-selection--single:focus, .select2-container--default .select2-selection--single:focus {
            outline: 0;
            border-color: #096d3e !important;
            box-shadow: 0 3px 10px 0 rgb(34 41 47 / 10%) !important;
        }
        .flag-icon {
            margin-left: 10px;
            margin-right: 10px;

            width: 1.5em !important;
            height: 1em;

        }
        .fullscreen{
            background: white;
        }
        .navigation li {
            position: relative;
            white-space: nowrap;
            margin-bottom: 0.3rem !important;
            margin-top: 0 !important;
        }
        .avatar {
            white-space: nowrap;
            background-color: #096d3e;
        }
        .main-menu.menu-light .navigation > .custom.active > a {
            background: unset;
            background: unset;
            box-shadow: unset;
            color: #FFFFFF;
            font-weight: 400;
            border-radius: 4px;
        }
        .dropdown-item.active, .dropdown-item:active {
            color: #FFFFFF;
            text-decoration: none;
            background-color: #096d3e;
        }
        .dropdown-item:hover, .dropdown-item:focus {
            color: #096d3e;
        }
        /*Start Scroll loading*/
        /* Start by setting display:none to make this hidden.
           Then we position it in relation to the viewport window
           with position:fixed. Width, height, top and left speak
           for themselves. Background we set to 80% white with
           our animation centered, and no-repeating */
        .loader-modal {
            overflow: initial !important;
            display: block;
            position: fixed;
            z-index: 100000;
            top: 80px;
            left: 50%;
            /* height: 100%; */
            /* width: 100%; */
            transform: translateX(-50%);
            /*background: rgba( 255, 255, 255, .8 )
            url("/media/img/loader.gif")
            50% 50%
            no-repeat;*/
        }

        .orderLoader{
            display: none;
            top: 0!important;
            left: 50%;
            height: 100%!important;
            width: 100%!important;
            background:
                rgba( 255, 255, 255, .8 )!important;
        }

        .digitalContentLoader{
            display: none;
            top: 0!important;
            /*right: 0!important;*/
            height: 100%!important;
            width: 100%!important;
            background:
                rgba( 255, 255, 255, .8 )!important;
        }

        .bankLoader{
            display: none;
            top: 0!important;
            right: 0!important;
            height: 100%!important;
            width: 100%!important;
            background:
                rgba( 255, 255, 255, .8 )!important;
        }



        .loader-modal b {
            /*background: #9bffe3;
            color: #9f9292;*/
            /*background: #efff00;

            color: #696969;
            padding: 0 6px;*/
            /*background: #efff004f;
            color: #696969;
            padding: 0 25px;
            border-radius: 33px;*/
            background: #f9edbe;
            border-radius: 2px;
            border: 1px solid #f0c36d;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            color: #666;
            padding: 5px 16px;
            color: #fff !important;
            background-color: #393ba7 !important;
            background: linear-gradient(to left, rgba(111, 113, 205, 0.95) 0%, rgba(70, 72, 159, 0.95) 90%) !important;
            border: 1px solid #393ba7 !important;
            padding: 3px 16px !important;
            border-radius: 4px !important;
        }

        .orderLoader b{
            position: relative;
            top: 50%;
            right: 50%;
        }

        .digitalContentLoader b{
            position: relative;
            top: 50%;
            right: 40%;
        }




        /* When the body has the loading class, we turn
           the scrollbar off with overflow:hidden */
        body.loading .loader-modal {
            overflow: hidden;
        }

        /* Anytime the body has the loading class, our
           modal element will be visible */
        body.loading .loader-modal {
            display: block;
        }
        .Loader {
            display: none;
            top: 0 !important;
            left: 50% !important;
            height: 100% !important;
            width: 100% !important;
            background: rgba(255, 255, 255, .8) !important;
        }
        /*End Scroll loading*/

    </style>
    <script>
        const userId="{{Auth::id()}}";
    </script>
    <script src="{{ asset('js/app.js')}}"></script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " style="display: none" data-open="click" data-menu="vertical-menu-modern" data-col="">

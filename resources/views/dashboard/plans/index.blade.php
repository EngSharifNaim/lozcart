@extends('dashboard.layouts.app')
@section('style')
    @if(App::isLocale('en'))
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <!-- END: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
        <link rel="stylesheet" href="https://mapp.sa/cPanel/css/cropper.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />

        <style>
            .dropify-wrapper .dropify-message p {
                font-size: 17px;
            }
        </style>
    @else

    @endif
    <style>
        #pricing #active-tb {
            background: #ffffff;
            box-shadow: 0px 6px 30px 5px rgb(89 91 181 / 10%);
        }
        #pricing .table {
            min-height: 471px;
        }
        #pricing .table {
            text-align: center;
            margin-top: 15px;
            padding: 30px 0;
            border-radius: 15px;
            border: none !important;
            box-shadow: 0px 2px 18px 0px rgb(198 198 198 / 30%);
            -webkit-transition: all .3s linear;
            -moz-transition: all .3s linear;
            -ms-transition: all .3s linear;
            -o-transition: all .3s linear;
            transition: all .3s linear;
            background: #fff;
        }
        #pricing .shape {
            height: 1px;
            margin: 0 auto 30px;
            position: relative;
            width: 60px;
            background-color: #096d3e;
        }
        #pricing .table .pricing-header {
            position: relative;
            text-align: center;
        }
        #pricing .table .pricing-header .price-value {
            font-size: 28px;
            color: #096d3e;
            position: relative;
            text-align: center;
            font-weight: 700;
            top: 0 !important;
            margin-bottom: 10px;
        }
        #pricing .table .pricing-header p {
            top: 0 !important;
            margin-bottom: 0;
        }
        #pricing .table .description {
            text-align: center;
            padding: 10px 10px;
            list-style: none;
            margin-bottom: 0;
        }
        #pricing .table .description li {
            font-size: 16px;
            font-weight: 400;
            color: #444;
            padding: 8px 0;
            text-align: center;
        }
        .custom-control{
            display: inline-block !important;
        }

    </style>
    <style>
        .sev_new h3 {
            position: relative;
            top: -30px;
        }

        .bord_radio_tab {;
            padding: 20px 25px;
            border-radius: 5px;
            margin: 10px;
            box-shadow: 0px 2px 6px 0px rgba(198, 198, 198, 0.3);
            border: 1px solid #e7e7e7;
        }

        .sev_new_text {
            padding: 10px;
            position: relative;
            top: -80px
        }

        .sev_new h4 {
            position: relative;
            top: -14px;
        }

        .sev_new h2 {
            position: relative;
            top: -12px;
            font-size: 20px
        }

        .button_pay a {
            padding: 10px 40px

        }

        .onle_radio {
            position: relative;
            top: -125px
        }

        .hide {
            display: none;
        }

        .toggle,
        .toggler {
            display: inline-block;
            vertical-align: middle;
            margin: 10px;
        }

        .toggler {
            color: #fff;
            transition: 0.2s;
            font-weight: normal;
        }

        /*
        .toggler--is-active {
          color: #9D1726;
        }
        */
        .b {
            display: block;
        }

        .toggle {
            position: relative;
            width: 60px;
            height: 28px;
            border-radius: 100px;
            background-color: #ffffff;
            overflow: hidden;
            box-shadow: inset 0 0 2px 1px rgba(0, 0, 0, 0.05);
        }

        .check {
            position: absolute;
            display: block;
            cursor: pointer;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 6;
        }

        .check:checked ~ .switch {
            left: 2px;
            right: 57.5%;
            transition: 0.25s cubic-bezier(0.785, 0.135, 0.15, 0.86);
            transition-property: left, right;
            transition-delay: 0.08s, 0s;
        }

        .switch {
            position: absolute;
            right: 2px;
            top: 3px;
            bottom: 2px;
            left: 54%;
            background: linear-gradient(to left, rgba(29, 196, 154, 0.95) 0%, rgba(29, 196, 154, 0.95) 90%);
            border-radius: 36px;
            z-index: 1;
            transition: 0.25s cubic-bezier(0.785, 0.135, 0.15, 0.86);
            transition-property: left, right;
            transition-delay: 0s, 0.08s;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .pp-switch {
            position: relative;
            top: -8px;
            margin: 0;
            padding: 0
        }

        .card-subsc {
            margin: 10px 5px;
            position: relative;
            display: flex;
            flex: 1;
        }

        .card-subsc .card-body {
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-subsc .card-body::after {
            content: " ";
            display: table;
            clear: both;
        }

        .card-subsc input[type="radio"] {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 22222;
        }

        .card-subsc .info .card-title {
            margin-bottom: 0;
        }

        /*
                .card-subsc .radioCircle {
                    width: 20px;
                    height: 20px;
                    background: #e5e5eb;
                    border-radius: 50px;
                    border: 1px solid #f0f0f0;
                    position: relative;
                    margin-left: 10px;
                }
        */

        /*
                .card-subsc .radioCircle::after {
                    content: " ";
                    width: 10px;
                    height: 10px;
                    background: #7374b6;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    border-radius: 50px;
                    -webkit-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
                    opacity: 0;
                }
        */
        .card-subsc .radioCircle {
            width: 20px;
            height: 20px;
            background: #fff;
            border-radius: 50px;
            border: 1px solid #fff;
            position: relative;
            right: -20px;

        }

        .card-subsc.plansSubCard .radioCircle {
            position: relative;
            left: -35px;
            top: -15px;
        }

        .card-subsc .info.months {
            position: relative;
            right: -10px;
            z-index: 222;
        }

        .card-subsc .radioCircle::after {
            content: "";
            color: #ffffff;
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 12px;
            width: 100%;
            height: 100%;
            line-height: 16px;
            border-radius: 50px;
            background: #096d3e;
            border-color: #096d3e;
            -webkit-transform: translate(-50%, -50%) rotate(10deg);
            transform: translate(-50%, -50%) rotate(10deg);

            opacity: 0;
        }

        .card-subsc .card-subscLabel {
            color: #000;
            background-color: #fff;
            border: none;
            -webkit-box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
            box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            width: 100%;
            border-radius: 4px;
            border: 1px solid #eeeef9;
        }

        .card-subsc .card-subscInput:checked ~ .card-subscLabel {
            background-color: #f7f5f9;
            -webkit-box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
            box-shadow: 0px 8px 15px rgba(70, 72, 195, .08);
            color: #fff;
            -webkit-transform: translateY(-7px);
            transform: translateY(-7px);
            border: 1px solid #096d3e;
        }

        .card-subsc .card-subscInput:checked ~ .card-subscLabel .radioCircle {
            background: #fff;
            border-color: #f7f5f9;
        }

        .card-subsc .card-subscInput:checked ~ .card-subscLabel .radioCircle img {
            width: 12px;
            position: absolute;
            z-index: 2222222;
            height: 10px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .card-subsc .radioCircle img {
            width: 12px;
            position: absolute;
            z-index: 2222222;
            height: 10px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .card-subsc .card-subscInput:checked ~ .card-subscLabel .radioCircle::after {
            opacity: 1;
        }

        .subscribe-modal-view .modal-title {
            margin-bottom: 1.5rem;

        }

        .subscribe-modal-view form {
            width: 100%;
        }

        .subscribe-modal-view .modal-footer {
            justify-content: center;
        }

        @media (max-width: 767px) {
            .card-subsc.plansSubCard {
                display: flex;
                flex: none;
                width: 47%;
            }

            .card-subsc-policis {
                display: block !important;
            }

            .card-subsc-policis .card-subsc {
                flex: none;
                width: 45%;
                display: inline-block;
            }

            .card-subsc.plansSubCard .radioCircle {
                position: relative;
                right: -40px;
                top: -4px;
            }

            .card-subsc.plansSubCard .card-subscInput:checked ~ .card-subscLabel .radioCircle {
                right: -30px;
                top: -12px;
            }
        }

        /*#loginModal_3 .card-subsc.plansSubCard {*/
        /*    display: flex;*/
        /*    flex: none;*/
        /*    width: 47%;*/
        /*}*/

        /*#loginModal_3 .card-subsc.plansSubCard .radioCircle {*/
        /*    position: absolute;*/
        /*    left: 19px;*/
        /*    top: 8px;*/
        /*}*/

        /*@media (max-width: 520px) {*/
        /*    #loginModal_3 .card-subsc.plansSubCard .radioCircle {*/
        /*        position: absolute;*/
        /*        left: 3px;*/
        /*    }*/

        /*    #loginModal_3 .card-subsc.plansSubCard .card-body {*/
        /*        padding: .6rem 2rem .6rem 1rem;*/
        /*    }*/

        /*}*/
    </style>
    <style>
        .r4rj p {
            font-size: 20px;
            font-weight: 600 !important;
            color: #28c76f;
        }

        .so {
            position: relative;
            top: 50px;
        }

        .fogj {
            font-size: 20px;
            font-weight: 600 !important;
            color: #28c76f;
        }

        .price-value {
            color: #555;
            font-size: 16px;
        }

        @media (min-width: 992px) {
            .packages-modal-view .modal-lg, .packages-modal-view .modal-xl {
                max-width: 75%;
            }
        }

        @media (max-width: 767px) {
            .packages-modal-view .packagesRows {
                max-height: 650px;
                overflow-y: scroll;
                -webkit-overflow-scrolling: scroll;
            }
        }

        .packages-modal-view .modal-header {
            background: #28c76f !important;
        }

        .packages-modal-view .modal-header .modal-title {
            color: #fff;
            width: 100%;
            text-align: center;
            font-size: 22px;
        }

        .packages-modal-view .modal-header .close {
            /*color: #fff;*/
        }

        .packages-modal-view .modal-body {
            padding: 0 5px;
            overflow: hidden;
        }

        .featname p {
            margin-bottom: 0;
            margin-top: 10px;
        }

        @media (min-width: 992px) {
            .subscribe-modal-view .modal-lg {
                max-width: 750px;

            }
        }

        .subscribe-modal-view .card-subsc .card-body {
            padding: .6rem 1rem;
        }

        .subscribe-modal-view .card-subscLabel .info p {
            margin-bottom: 0;
            color: #333;
            margin-top: 10px;
        }

        /*.comaparePackagesBtn {
            position: relative;
            overflow: hidden;
            background: linear-gradient(to left, rgb(111 113 205 / 1) 0%, rgb(70 72 159 / 1) 90%);
            color: #fff;
        }

        .comaparePackagesBtn span {
            display: inline-block;
            vertical-align: baseline;
            zoom: 1;
            position: relative;
            padding: 0 20px;
        }

        .comaparePackagesBtn span:before,
        .comaparePackagesBtn span:after {
            content: '';
            display: block;
            width: 400px;
            position: absolute;
            top: 0.73em;
            border-top: 1px solid #d8d8d8;
            z-index: -1;
        }

        .comaparePackagesBtn span:before {
            right: 148%;
        }

        .comaparePackagesBtn span:after {
            left: 148%;
        }*/

        .card-subsc-policis {
            margin-bottom: 15px;
        }

        .card-subsc-policis .card-subsc .radioCircle {
            position: absolute;
            left: 7px;
            z-index: 222;
            top: 7px;
        }


    </style>
    <style>
        .current{
            background: linear-gradient(to left, rgb(40 199 111) 0%, rgb(40 199 111 / 71%) 90%) !important;
            box-shadow: 0px 6px 30px 5px rgb(89 91 181 / 10%)  !important;
        }
        .current .title h3{
            color: #fff;
        }
        .current .title .shape{
            color: #fff  !important;
            background: #fff  !important;
        }
        .current .toggler {
            color: #ffffff  !important;
        }
        .current .pricing-header .price-value{
            font-size: 24px  !important;
            font-weight: normal  !important;
            font-weight: 400  !important;
            color: #fff  !important;
            position: relative  !important;
            top: 10px  !important;
            padding: 5px  !important;
        }
        .current .pricing-header .price-value a span{
            color: #fff;
        }
        .current  .description li{
            color: #fff  !important;
        }
        .current a{
            color: #fff  !important;
        }
        .btn-warning {
            border-color: #096d3e !important;
            background-color: #096d3e !important;
            color: #FFFFFF !important;
        }

    </style>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">{{__('Manage Subscriptions')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Manage Subscriptions')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-plan">
                    <div class="row">
                        <div class="col-12">
                            <div class="card top-plan-info">
                                <div style="padding:20px">
                                    <div class="container-fluid">
                                        <div class="row align-items-center">
                                            @if($current_plan->status==2 && Auth::user()->status==3)
                                                <div class=" col-lg-9 col-sm-7 col-md-8"><span style="color: red;
                                vertical-align: middle;
                                font-size: 40px;
                                margin-left: 4px;font-weight:700;line-height:0;">*</span>
                                                    | {{__('wait approve')}}

                                                </div>
                                            @endif
                                            @if (Auth::user()->status==1)
                                                    @if($current_plan->status==1 )
                                                        <div class=" col-lg-9 col-sm-7 col-md-8"><span style="color: red;
                            vertical-align: middle;
                            font-size: 40px;
                            margin-left: 4px;font-weight:700;line-height:0;">*</span>
                                                            | {{__('Your subscription ends on: ')}}
                                                            {{$current_plan->end_date}}
                                                            <small>
                                                                {{date_diff(new \DateTime(\Carbon\Carbon::createFromFormat('Y-m-d', $current_plan->end_date)), new \DateTime())->format("( %y ) ". __('Years') .",( %m ) ". __('Months') .", ( %d ) " . __('days') . "") }}
                                                                {{--                                                    {{__('Day')}}--}}
                                                            </small>
                                                        </div>
                                                    @endif
                                            @endif
                                            @if (Auth::user()->status==2)
                                                <div class=" col-lg-9 col-sm-7 col-md-8"><span style="color: red;
                    vertical-align: middle;
                    font-size: 40px;
                    margin-left: 4px;font-weight:700;line-height:0;">*</span>
                                                    | {{__('Your subscription expire ')}}
                                                </div>
                                            @endif
                                             @if (Auth::user()->status==0)
                                                <div class=" col-lg-9 col-sm-7 col-md-8"><span style="color: red;
                    vertical-align: middle;
                    font-size: 40px;
                    margin-left: 4px;font-weight:700;line-height:0;">*</span>
                                                    | {{__('Your subscription Pending By Adminstrations')}}
                                                </div>
                                            @endif

                                            <div class="col-lg-3 col-sm-5 col-md-4 btn btn-success " >
                                                {{__('Current package: ')}}{{App::isLocale('en')? $current_plan->plan->title: $current_plan->plan->title_ar}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div>
                    </div>
                </section>
                <section id="pricing" class="section-padding" style="background: #f7f5f9;margin: 0 auto;">
                    <div class="container" style="padding:0;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="table " id="active-tb" data-wow-delay="1.2s" style="background: #ffffff;box-shadow:0px 6px 30px 5px rgba(89,91,181,0.1);">
                                    <div class="title">
                                        <h3>
                                            @if(App::isLocale('en'))
                                            {{$first_plan->title}}
                                            @else
                                                {{$first_plan->title_ar}}
                                            @endif
                                        </h3>
                                        <div style="color: #fff;background-color: #096d3e;" class="shape" data-wow-delay="0.3s"></div>
                                    </div>
                                    <div class="pricing-header">
                                        <div class="pp-switch">
                                            <label class="toggler toggler--is-active" id="filt-monthly-1" style="color:#000000"> {{__('Monthly')}} </label>
                                            <div class="custom-control custom-switch custom-switch-success">
                                                <input type="checkbox" class="custom-control-input"  id="switcher-1"/>
                                                <label class="custom-control-label" for="switcher-1">
                                                    <span class="switch-icon-left"></span>
                                                    <span class="switch-icon-right">x</span>
                                                </label>
                                            </div>
                                            <label class="toggler" id="filt-yearly-1" style="color:#000000">{{__('Annual')}} </label>

                                        </div>
                                        <div class="pricing-header" id="monthly-1">
                                            <p class="price-value">
                                                <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#000000">
                                                    {{$first_plan->price_month}} </a>{{$first_plan->discount_month}}
                                                <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                                        </div>
                                        <div class="pricing-header hide" id="yearly-1">
                                            <p class="price-value" >
                                                <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#096d3e">
                                                    {{$first_plan->price_year}} </a>{{$first_plan->discount_year}}
                                                <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                                        </div>

                                    </div>
                                    <ul class="description">
                                        @foreach($first_plan->services as $item)
                                        <li>
                                            @if(App::isLocale('en'))
                                                {{$item->description}}
                                            @else
                                                {{$item->description_ar}}
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                    <a href="#" data-toggle="modal" data-target=".packages-modal-view" style="color:#096d3e; display: block">
                                          {{__('More features')}}
                                    </a>
{{--                                    @if (\Carbon\Carbon::parse($current_plan->end_date) <= Carbon\Carbon::today()->toDateString() )--}}
                                        <a href="#" data-toggle="modal" data-target="#loginModal_1" class="btn btn-success" style=";border-radius: 5px;margin:15px 0 0 0;padding:10px 40px;background: #fff;color: #096d3e;font-weight: bold;font-size: 16px">
                                            {{__('Subscription')}}
                                        </a>
{{--                                    @endif--}}
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="table current" id="active-tb" data-wow-delay="1.2s" >
                                    <div class="title">
                                        <h3 >
                                            @if(App::isLocale('en'))
                                                {{$second_plan->title}}
                                            @else
                                                {{$second_plan->title_ar}}
                                            @endif
                                        </h3>
                                        <div class="shape " data-wow-delay="0.3s"></div>
                                    </div>
                                    <div class="pricing-header">
                                        <div class="pp-switch">
                                            <label class="toggler toggler--is-active" id="filt-monthly">{{__('Monthly')}}  </label>
                                        <div class="custom-control custom-switch custom-switch-success">
                                            <input type="checkbox" class="custom-control-input"  id="switcher"/>
                                            <label class="custom-control-label" for="switcher">
                                                <span class="switch-icon-left"></span>
                                                <span class="switch-icon-right">x</span>
                                                </label>
                                            </div>
                                        <label class="toggler" id="filt-yearly"> {{__('Annual')}}</label>

                                        </div>
                                        <div class="pricing-header" id="monthly">
                                            <p class="price-value">
                                                <a style="   text-decoration-line: line-through;margin:0 10px ">
                                                    {{$second_plan->price_month}} </a>{{$second_plan->discount_month}} <span style="color: #fff ;"> {{__('USD')}}  </span></p>
                                        </div>
                                        <div class="pricing-header hide" id="yearly">
                                            <p class="price-value" >
                                                <a style="   text-decoration-line: line-through;margin:0 10px ">
                                                    {{$second_plan->price_year}} </a>{{$second_plan->discount_year}} <span style="color: #fff ;"> {{__('USD')}}  </span></p>
                                        </div>

                                    </div>
                                    <ul class="description">
                                        @foreach($second_plan->services as $item)
                                            <li >
                                                @if(App::isLocale('en'))
                                                    {{$item->description}}
                                                @else
                                                    {{$item->description_ar}}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="#" data-toggle="modal" data-target=".packages-modal-view" style="display:block;">
                                        {{__('More features')}}
                                    </a>
{{--                                    @if (\Carbon\Carbon::parse($current_plan->end_date) <= Carbon\Carbon::today()->toDateString() )--}}
                                        <a href="#" data-toggle="modal" data-target="#loginModal_2" class="btn btn-success" style=";border-radius: 5px;margin:15px 0 0 0;padding:10px 40px;background: #fff;color: #096d3e;font-weight: bold;font-size: 16px">
                                            {{__('Subscription')}}
                                        </a>
{{--                                    @endif--}}

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="table " id="active-tb" data-wow-delay="1.2s" style="background: #ffffff;box-shadow:0px 6px 30px 5px rgba(89,91,181,0.1);">
                                    <div class="title">
                                        <h3 style="/*color: #fff;*/">
                                            @if(App::isLocale('en'))
                                                {{$third_plan->title}}
                                            @else
                                                {{$third_plan->title_ar}}
                                            @endif
                                        </h3>
                                        <div style="color: #fff;background-color: #096d3e;" class="shape " data-wow-delay="0.3s"></div>
                                    </div>
                                    <div class="pricing-header">
                                        <div class="pp-switch">
                                            <label class="toggler toggler--is-active" id="filt-monthly-2" style="color:#000000"> {{__('Monthly')}} </label>
                                            <div class="custom-control custom-switch custom-switch-success">
                                                <input type="checkbox" class="custom-control-input"  id="switcher-2"/>
                                                <label class="custom-control-label" for="switcher-2">
                                                    <span class="switch-icon-left"></span>
                                                    <span class="switch-icon-right">x</span>
                                                </label>
                                            </div>
                                            <label class="toggler" id="filt-yearly-2" style="color:#000000">{{__('Annual')}} </label>

                                        </div>
                                        <div class="pricing-header" id="monthly-2">
                                            <p class="price-value">
                                                <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#000000">
                                                    {{$third_plan->price_month}} </a>{{$third_plan->discount_month}}
                                                <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                                        </div>
                                        <div class="pricing-header hide" id="yearly-2">
                                            <p class="price-value" >
                                                <a style="   text-decoration-line: line-through;margin:0 10px " style="color:#096d3e">
                                                    {{$third_plan->price_year}} </a>{{$third_plan->discount_year}}
                                                <span style="color: #096d3e ;"> {{__('USD')}}  </span></p>
                                        </div>

                                    </div>
                                    <ul class="description">
                                        @foreach($third_plan->services as $item)
                                            <li>
                                                @if(App::isLocale('en'))
                                                    {{$item->description}}
                                                @else
                                                    {{$item->description_ar}}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="#" data-toggle="modal" data-target=".packages-modal-view" style="color:#096d3e;display:block;">
                                        {{__('More features')}}
                                    </a>
{{--                                    @if (\Carbon\Carbon::parse($current_plan->end_date) <= Carbon\Carbon::today()->toDateString() || $current_plan->status)--}}
                                    <a href="#" data-toggle="modal" data-target="#loginModal_3" class="btn btn-success bg-purple" style="border-radius: 5px;margin: 15px 0 0 0;padding: 10px 40px;color:#fff;font-weight: bold;font-size: 16px; border-color:#ffffff;">
                                       {{__('Subscription')}}  </a>
{{--                                    @endif--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="card top-plan-info mb-0">
                    <div style="padding:30px 20px">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class=" col-lg-10 col-sm-7 col-md-8">
                                    <h3 >{{__('For special requests')}}</h3>
                                    <p >
                                        {{__('We provide you with your special needs to create an integrated online store')}}
                                    </p>
                                </div>
                                <div class="col-lg-2 col-sm-5 col-md-4 btn btn-success" >
                                    <a href="mailto:#" style="color: #fff;display:block;padding:12px 10px;">{{__('Contact us')}}</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                </div>
                <section class="business-plans pb-3">
                    <div class="text-center">
                        <h2  class="mt-4 mb-4">{{__('Common Questions')}} </h2>
                    </div>

                    <div id="accordion">
                        <div class="row">
                            @foreach($faqs as $item)
                            <div class="col-md-6">
                                <div class="card">
                                    <div id="headingCollapse{{$item->id}}" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#collapse{{$item->id}}" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                                        <span class="lead collapse-title">
                                             @if(App::isLocale('en'))
                                                {{$item->question}}
                                            @else
                                                {{$item->question_ar}}
                                            @endif
                                        </span>
                                    </div>
                                    <div id="collapse{{$item->id}}" role="tabpanel" aria-labelledby="headingCollapse{{$item->id}}" class="collapse" aria-expanded="false">
                                        <div class="card-body">
                                            @if(App::isLocale('en'))
                                                {{$item->answer}}
                                            @else
                                                {{$item->answer_ar}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div class="modal fade packages-modal-view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Packages')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row  border-default onle-tabil packagesRows" style="border:1px solid#efefef ; box-shadow: 0px 6px 30px 0px rgba(89,91,181,0.1);border-radius:15px;">


                        <div class=" text-white p-2 mb-3 col-3 text-center  d-sm-block   r4rj " style="background: #f7f5f9;border-left:1px solid#eee; ">
                            <p class="so " style="font-weight: 500"> {{__('Features')}} </p>

                        </div>

                        <div class=" text-white p-2 mb-3 col-3 text-center  d-sm-block  " style="background: #f7f5f9;border-left:1px solid#eee">
                            <p class="fogj" style="font-weight: 500">
                                @if(App::isLocale('en'))
                                    {{$first_plan->title}}
                                @else
                                    {{$first_plan->title_ar}}
                                @endif
                            </p>
                            <div class="pp-switch-two">
                                <label style="color: #5153a6" class="toggler" id="filt-yearly-4"> {{__('Yearly')}} </label>
                                <div class="custom-control custom-switch custom-switch-success">
                                    <input type="checkbox" class="custom-control-input"  id="switcher-4"/>
                                    <label class="custom-control-label" for="switcher-4">
                                        <span class="switch-icon-left"></span>
                                        <span class="switch-icon-right">x</span>
                                    </label>
                                </div>
                                <label style="color: #5153a6" class="toggler" id="filt-monthly-4"> {{__('Monthly')}}</label>
                            </div>


                            <p class="price-value hide" id="monthly-4" style="font-size:20px;font-weight: bold;position: relative;top:10px">
                                <a style="   text-decoration-line: line-through;margin:0 10px ">
                                    {{$first_plan->price_month}} </a>{{$first_plan->discount_month}} <span > {{__('USD')}}  </span></p>


                            <p class="price-value" id="yearly-4" style="font-size:20px;font-weight: bold;position: relative;top:10px" >
                                <a style="   text-decoration-line: line-through;margin:0 10px ">
                                    {{$first_plan->price_year}} </a>{{$first_plan->discount_year}} <span > {{__('USD')}}  </span></p>
{{--                            <p style="position: relative;top:0px;color: #5153a6;">--}}
{{--                                @if(App::isLocale('en'))--}}
{{--                                    {{$first_plan->description}}--}}
{{--                                @else--}}
{{--                                    {{$first_plan->description_ar}}--}}
{{--                                @endif--}}
{{--                            </p>--}}

                        </div>

                        <div class=" text-white p-2 mb-3 col-3 text-center  d-sm-block " style="background: #f7f5f9;border-left:1px solid#eee">
                            <p class="fogj" style="font-weight: 500">
                                @if(App::isLocale('en'))
                                    {{$second_plan->title}}
                                @else
                                    {{$second_plan->title_ar}}
                                @endif
                            </p>
                            <div class="pp-switch-two">
                                <label style="color: #5153a6" class="toggler" id="filt-yearly-two"> {{__('Yearly')}} </label>
                                <div class="custom-control custom-switch custom-switch-success">
                                    <input type="checkbox" class="custom-control-input"  id="switcher-two"/>
                                    <label class="custom-control-label" for="switcher-two">
                                        <span class="switch-icon-left"></span>
                                        <span class="switch-icon-right">x</span>
                                    </label>
                                </div>
{{--                                <div style="    box-shadow: 0px 2px 10px 0px rgba(198, 198, 198, 0.6);" class="toggle">--}}
{{--                                    <input type="checkbox" id="switcher-two" class="check">--}}
{{--                                    <b style=" background: linear-gradient(to left, rgba(111,113,205,0.95) 0%, rgba(70,72,159, 0.95) 90%);" class="b switch"></b>--}}
{{--                                </div>--}}
                                <label style="color: #5153a6" class="toggler" id="filt-monthly-two"> {{__('Monthly')}}</label>
                            </div>


                                <p class="price-value hide" id="monthly-two" style="font-size:20px;font-weight: bold;position: relative;top:10px">
                                    <a style="   text-decoration-line: line-through;margin:0 10px ">
                                        {{$second_plan->price_month}} </a>{{$second_plan->discount_month}} <span > {{__('USD')}}  </span></p>


                                <p class="price-value" id="yearly-two" style="font-size:20px;font-weight: bold;position: relative;top:10px" >
                                    <a style="   text-decoration-line: line-through;margin:0 10px ">
                                        {{$second_plan->price_year}} </a>{{$second_plan->discount_year}} <span > {{__('USD')}}  </span></p>

                        </div>
                        <div class=" text-white p-2 mb-3 col-3 text-center  d-sm-block  " style="background: #f7f5f9;border-left:1px solid#eee">
                            <p class="fogj" style="font-weight: 500">
                                @if(App::isLocale('en'))
                                    {{$third_plan->title}}
                                @else
                                    {{$third_plan->title_ar}}
                                @endif
                            </p>
                            <div class="pp-switch-two">
                                <label style="color: #5153a6" class="toggler" id="filt-yearly-5"> {{__('Yearly')}} </label>
                                <div class="custom-control custom-switch custom-switch-success">
                                    <input type="checkbox" class="custom-control-input"  id="switcher-5"/>
                                    <label class="custom-control-label" for="switcher-5">
                                        <span class="switch-icon-left"></span>
                                        <span class="switch-icon-right">x</span>
                                    </label>
                                </div>
                                <label style="color: #5153a6" class="toggler" id="filt-monthly-5"> {{__('Monthly')}}</label>
                            </div>


                            <p class="price-value hide" id="monthly-5" style="font-size:20px;font-weight: bold;position: relative;top:10px">
                                <a style="   text-decoration-line: line-through;margin:0 10px ">
                                    {{$third_plan->price_month}} </a>{{$third_plan->discount_month}} <span > {{__('USD')}}  </span></p>


                            <p class="price-value" id="yearly-5" style="font-size:20px;font-weight: bold;position: relative;top:10px" >
                                <a style="   text-decoration-line: line-through;margin:0 10px ">
                                    {{$third_plan->price_year}} </a>{{$third_plan->discount_year}} <span > {{__('USD')}}  </span></p>
{{--                            <p style="position: relative;top:0px;color: #5153a6;">--}}
{{--                                @if(App::isLocale('en'))--}}
{{--                                    {{$third_plan->description}}--}}
{{--                                @else--}}
{{--                                    {{$third_plan->description_ar}}--}}
{{--                                @endif--}}
{{--                            </p>--}}

                        </div>

                        @foreach( $features as $feature)
                        <div class="py-2 col-3 text-center  d-sm-block featname">
                            <p>
                                @if(App::isLocale('en'))
                                    {{$feature->name}}
                                @else
                                    {{$feature->name_ar}}
                                @endif
                            </p>
                        </div>
                        @foreach($feature->feature_plan as $item)
                        <div class="py-2 odd col-3 text-center">
                            @if ($item->feature_value=='y')
                                <del><i class="fas fa-check-circle" style="font-size:24px ;color: #7ab77a"></i></del>
{{--                            @endif--}}
                            @elseif ($item->feature_value=='n')
                                <del><i class="fas fa-times-circle" style="font-size:24px ;color: #e52828"></i></del>
                            @else
                                {{$item->feature_value}}
                            @endif
                        </div>
                        @endforeach

{{--                        <div class="py-2 odd col-3 text-center">--}}
{{--                            <del><i class="fas fa-check-circle" style="font-size:24px ;color: #7ab77a"></i></del>--}}
{{--                        </div>--}}
{{--                        <div class="py-2 odd col-3 text-center">--}}
{{--                            <del><i class="fas fa-check-circle" style="font-size:24px ;color: #7ab77a"></i></del>--}}
{{--                        </div>--}}
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade subscribe-modal-view" id="loginModal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg respons" role="document">
            <form action="{{route('plan.subscription',$first_plan->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="border: 0;background: #096d3e ; padding: 20px ;">
                        <h3 style="color: #fff;font-size:22px;width: 100%;text-align: center;position: relative;right: 27px;margin:0;">
                            @if(App::isLocale('en'))
                                {{$first_plan->title}}
                            @else
                                {{$first_plan->title_ar}}
                            @endif
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 25px;">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="modal-body">

                        <h3 class="modal-title" id="exampleModalLongTitle"> {{__('Choose the type of subscription')}} </h3>
                        <div class="row mt-2">
                            <div class="card-subsc plansSubCard">
                                <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="1" required="" value="1">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">{{__('Month')}}</h5>
                                            <p class="option_price" id="option_price_1">
                                                {{$first_plan->discount_month}} {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card-subsc plansSubCard">
                                <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="2" required="" value="2">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">3 {{__('Months')}}</h5>
                                            <p class="option_price" id="option_price_2">
                                                {{$first_plan->discount_month *3}}
                                                {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card-subsc plansSubCard">
                                <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="3" required="" value="3">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">6 {{__('Months')}}</h5>
                                            <p class="option_price" id="option_price_3">{{$first_plan->discount_month *6}}
                                                {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card-subsc plansSubCard">
                                <input checked="" type="radio" name="option_id" class="card-subscInput optionInput" data-id="4" required="" value="4">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">{{__('Year')}}</h5>
                                            <p class="option_price" id="option_price_4">{{$first_plan->discount_year}}
                                                {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>


                    <div style="padding: .8rem 1rem 0;">

                        <h3 class="modal-title" id="exampleModalLongTitle"> {{__('Choose a payment method')}} </h3>
                    </div>

                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-md-4 text-center">
                                <div class="card-subsc">
                                    <input class="card-subscInput" type="radio" name="type" required="" checked="" value="onlinePayment">
                                    <label class="card-subscLabel">
                                        <div class="card-body" style="display:block;padding:0.5rem 2rem">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info">
                                                <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Credit Card')}}</h5>
                                                <img class="img-responsive w-100" src="{{asset('photo/onlinePay.png')}}" height="50">
                                            </div>
                                        </div>
                                    </label>
                                </div>

                            </div>
                            <div class="col-md-4   text-center">
                                <div class="card-subsc">
                                    <input class="card-subscInput" type="radio" name="type" required="" value="bankTransfer">
                                    <label class="card-subscLabel">
                                        <div class="card-body" style="display:block; padding:0.5rem 2rem">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info">
                                                <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Bank transfer')}}</h5>
                                                <img class="img-responsive" src="{{asset('photo/bankTransfer.jpg')}}" height="50">
                                            </div>
                                        </div>
                                    </label>
                                </div>

                            </div>
                            <div class="col-md-4   text-center">
                                <div class="card-subsc">
                                    <input class="card-subscInput" type="radio" name="type" required="" value="payPal">
                                    <label class="card-subscLabel">
                                        <div class="card-body" style="display:block; padding:0.5rem 2rem">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info">
                                                <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Paypal')}}</h5>
                                                <img class="img-responsive" src="{{asset('photo/paypal.png')}}" height="50">
                                            </div>
                                        </div>
                                    </label>
                                </div>

                            </div>

                        </div>
                    </div>
                    {{--      <div class="modal-body">
                              <h3 class="modal-title" style="margin-top: 1rem"> {{__('Other services')}} </h3>

                              <div class="card-bar-title" style="padding: 10px 10px;
                                   border-radius: 5px;
                                   font-size: 15px;">
                                    {{__('SMSA bills of lading')}}
                              </div>
                              <div class="card-subsc-policis" style="display:flex;">

                                  <div class="card-subsc">
                                      <input class="card-subscInput" type="radio" name="smsa_policies" id="radio1" value="10">
                                      <label class="card-subscLabel">
                                          <div class="card-body">
                                              <div class="radioCircle">
                                                  <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                              </div>
                                              <div class="info months">
                                                  <h5 class="card-title" style="text-align:center;">10
                                                      {{__('policy')}} </h5>
                                                  <p>280 {{__('USD')}}</p>
                                              </div>
                                          </div>
                                      </label>
                                  </div>

                                  <div class="card-subsc">
                                      <input class="card-subscInput" type="radio" name="smsa_policies" id="radio2" value="50">
                                      <label class="card-subscLabel">
                                          <div class="card-body">
                                              <div class="radioCircle">
                                                  <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                              </div>
                                              <div class="info months">
                                                  <h5 class="card-title" style="text-align:center;">50
                                                      {{__('policy')}} </h5>
                                                  <p>1400 {{__('USD')}}</p>
                                              </div>
                                          </div>
                                      </label>
                                  </div>
                                  <div class="card-subsc">
                                      <input class="card-subscInput" type="radio" name="smsa_policies" id="radio3" value="100">
                                      <label class="card-subscLabel">
                                          <div class="card-body">
                                              <div class="radioCircle">
                                                  <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                              </div>
                                              <div class="info months">
                                                  <h5 class="card-title" style="text-align:center;">100
                                                      {{__('policy')}} </h5>
                                                  <p>2800 {{__('USD')}}</p>
                                              </div>
                                          </div>
                                      </label>
                                  </div>

                              </div>

                              <div class="card-bar-title" style="padding: 10px 10px;
                                   border-radius: 5px;
                                   font-size: 15px;">
                                  {{__('Domain reservation')}}
                              </div>

                              <div class="card-subsc" style="max-width:225px;cursor:pointer!important;">
                                  <input class="card-subscInput" type="checkbox" name="domain" id="radioDomain" style="    position: absolute;
                                      top: -7px;
                                      right: 0;
                                      left: 0;
                                      bottom: 0;
                                      width: 100%;
                                      height: 100%;
                                      opacity: 0;    z-index: 222;    cursor: pointer;">
                                  <label class="card-subscLabel">
                                      <div class="card-body">
                                          <div class="radioCircle" style="    position: absolute;
                                              right: 3px;
                                              top: 2px;">
                                              <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                          </div>
                                          <div class="info">
                                              <h5 class="card-title" style="text-align:center;"></h5>
                                              <p style="margin: 5px 0;">99 {{__('USD')}}</p>
                                          </div>
                                      </div>
                                  </label>
                              </div>

                          </div>--}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success bg-purple" style="border-radius: 3px;margin: 0 0 0 0;padding: 10px 40px;color:#fff;font-size: 16px; border-color:#ffffff;width: 100%;
                                    max-width: 35%;">
                            {{__('Subscription')}}
                        </button>


                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="modal fade subscribe-modal-view" id="loginModal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-lg respons" role="document">
            <form action="{{route('plan.subscription',$second_plan->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header" style="border: 0;background: #096d3e ; padding: 20px ;">
                        <h3 style="color: #fff;font-size:22px;width: 100%;text-align: center;position: relative;right: 27px;margin:0;">
                            @if(App::isLocale('en'))
                                {{$second_plan->title}}
                            @else
                                {{$second_plan->title_ar}}
                            @endif
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 25px;">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>


                    <div class="modal-body">

                        <h3 class="modal-title" id="exampleModalLongTitle"> {{__('Choose the type of subscription')}} </h3>
                        <div class="row mt-2">
                            <div class="card-subsc plansSubCard">
                                <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="1" required="" value="1">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">{{__('Month')}}</h5>
                                            <p class="option_price" id="option_price_1">
                                                {{$second_plan->discount_month}} {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card-subsc plansSubCard">
                                <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="2" required="" value="2">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">3 {{__('Months')}}</h5>
                                            <p class="option_price" id="option_price_2">
                                                {{$second_plan->discount_month *3}}
                                                {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card-subsc plansSubCard">
                                <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="3" required="" value="3">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">6 {{__('Months')}}</h5>
                                            <p class="option_price" id="option_price_3">{{$second_plan->discount_month *6}}
                                                {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card-subsc plansSubCard">
                                <input checked="" type="radio" name="option_id" class="card-subscInput optionInput" data-id="4" required="" value="4">
                                <label class="card-subscLabel">
                                    <div class="card-body">
                                        <div class="radioCircle">
                                            <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                        </div>
                                        <div class="info months">
                                            <h5 class="card-title">{{__('Year')}}</h5>
                                            <p class="option_price" id="option_price_4">{{$second_plan->discount_year}}
                                                {{__('USD')}}</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                    </div>


                    <div style="padding: .8rem 1rem 0;">

                        <h3 class="modal-title" id="exampleModalLongTitle"> {{__('Choose a payment method')}} </h3>
                    </div>

                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-md-4 text-center">
                                <div class="card-subsc">
                                    <input class="card-subscInput" type="radio" name="type" required="" checked="" value="onlinePayment">
                                    <label class="card-subscLabel">
                                        <div class="card-body" style="display:block;padding:0.5rem 2rem">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info">
                                                <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Credit Card')}}</h5>
                                                <img class="img-responsive w-100" src="{{asset('photo/onlinePay.png')}}" height="50">
                                            </div>
                                        </div>
                                    </label>
                                </div>

                            </div>
                            <div class="col-md-4   text-center">
                                <div class="card-subsc">
                                    <input class="card-subscInput" type="radio" name="type" required="" value="bankTransfer">
                                    <label class="card-subscLabel">
                                        <div class="card-body" style="display:block; padding:0.5rem 2rem">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info">
                                                <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Bank transfer')}}</h5>
                                                <img class="img-responsive" src="{{asset('photo/bankTransfer.jpg')}}" height="50">
                                            </div>
                                        </div>
                                    </label>
                                </div>

                            </div>
                            <div class="col-md-4   text-center">
                                <div class="card-subsc">
                                    <input class="card-subscInput" type="radio" name="type" required="" value="payPal">
                                    <label class="card-subscLabel">
                                        <div class="card-body" style="display:block; padding:0.5rem 2rem">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info">
                                                <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Paypal')}}</h5>
                                                <img class="img-responsive" src="{{asset('photo/paypal.png')}}" height="50">
                                            </div>
                                        </div>
                                    </label>
                                </div>

                            </div>

                        </div>
                    </div>
                    {{--      <div class="modal-body">
                              <h3 class="modal-title" style="margin-top: 1rem"> {{__('Other services')}} </h3>

                              <div class="card-bar-title" style="padding: 10px 10px;
                                   border-radius: 5px;
                                   font-size: 15px;">
                                    {{__('SMSA bills of lading')}}
                              </div>
                              <div class="card-subsc-policis" style="display:flex;">

                                  <div class="card-subsc">
                                      <input class="card-subscInput" type="radio" name="smsa_policies" id="radio1" value="10">
                                      <label class="card-subscLabel">
                                          <div class="card-body">
                                              <div class="radioCircle">
                                                  <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                              </div>
                                              <div class="info months">
                                                  <h5 class="card-title" style="text-align:center;">10
                                                      {{__('policy')}} </h5>
                                                  <p>280 {{__('USD')}}</p>
                                              </div>
                                          </div>
                                      </label>
                                  </div>

                                  <div class="card-subsc">
                                      <input class="card-subscInput" type="radio" name="smsa_policies" id="radio2" value="50">
                                      <label class="card-subscLabel">
                                          <div class="card-body">
                                              <div class="radioCircle">
                                                  <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                              </div>
                                              <div class="info months">
                                                  <h5 class="card-title" style="text-align:center;">50
                                                      {{__('policy')}} </h5>
                                                  <p>1400 {{__('USD')}}</p>
                                              </div>
                                          </div>
                                      </label>
                                  </div>
                                  <div class="card-subsc">
                                      <input class="card-subscInput" type="radio" name="smsa_policies" id="radio3" value="100">
                                      <label class="card-subscLabel">
                                          <div class="card-body">
                                              <div class="radioCircle">
                                                  <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                              </div>
                                              <div class="info months">
                                                  <h5 class="card-title" style="text-align:center;">100
                                                      {{__('policy')}} </h5>
                                                  <p>2800 {{__('USD')}}</p>
                                              </div>
                                          </div>
                                      </label>
                                  </div>

                              </div>

                              <div class="card-bar-title" style="padding: 10px 10px;
                                   border-radius: 5px;
                                   font-size: 15px;">
                                  {{__('Domain reservation')}}
                              </div>

                              <div class="card-subsc" style="max-width:225px;cursor:pointer!important;">
                                  <input class="card-subscInput" type="checkbox" name="domain" id="radioDomain" style="    position: absolute;
                                      top: -7px;
                                      right: 0;
                                      left: 0;
                                      bottom: 0;
                                      width: 100%;
                                      height: 100%;
                                      opacity: 0;    z-index: 222;    cursor: pointer;">
                                  <label class="card-subscLabel">
                                      <div class="card-body">
                                          <div class="radioCircle" style="    position: absolute;
                                              right: 3px;
                                              top: 2px;">
                                              <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                          </div>
                                          <div class="info">
                                              <h5 class="card-title" style="text-align:center;"></h5>
                                              <p style="margin: 5px 0;">99 {{__('USD')}}</p>
                                          </div>
                                      </div>
                                  </label>
                              </div>

                          </div>--}}
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success bg-purple" style="border-radius: 3px;margin: 0 0 0 0;padding: 10px 40px;color:#fff;font-size: 16px; border-color:#ffffff;width: 100%;
                                    max-width: 35%;">
                            {{__('Subscription')}}
                        </button>


                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="modal fade subscribe-modal-view" id="loginModal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-lg respons" role="document">
                <form action="{{route('plan.subscription',$third_plan->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header" style="border: 0;background: #096d3e ; padding: 20px ;">
                            <h3 style="color: #fff;font-size:22px;width: 100%;text-align: center;position: relative;right: 27px;margin:0;">
                                @if(App::isLocale('en'))
                                    {{$third_plan->title}}
                                @else
                                    {{$third_plan->title_ar}}
                                @endif
                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 25px;">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>


                        <div class="modal-body">

                            <h3 class="modal-title" id="exampleModalLongTitle"> {{__('Choose the type of subscription')}} </h3>
                            <div class="row mt-2">
                                <div class="card-subsc plansSubCard">
                                    <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="1" required="" value="1">
                                    <label class="card-subscLabel">
                                        <div class="card-body">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info months">
                                                <h5 class="card-title">{{__('Month')}}</h5>
                                                <p class="option_price" id="option_price_1">
                                                    {{$third_plan->discount_month}} {{__('USD')}}</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="card-subsc plansSubCard">
                                    <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="2" required="" value="2">
                                    <label class="card-subscLabel">
                                        <div class="card-body">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info months">
                                                <h5 class="card-title">3 {{__('Months')}}</h5>
                                                <p class="option_price" id="option_price_2">
                                                    {{$third_plan->discount_month *3}}
                                                    {{__('USD')}}</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="card-subsc plansSubCard">
                                    <input type="radio" name="option_id" class="card-subscInput optionInput" data-id="3" required="" value="3">
                                    <label class="card-subscLabel">
                                        <div class="card-body">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info months">
                                                <h5 class="card-title">6 {{__('Months')}}</h5>
                                                <p class="option_price" id="option_price_3">{{$third_plan->discount_month *6}}
                                                    {{__('USD')}}</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="card-subsc plansSubCard">
                                    <input checked="" type="radio" name="option_id" class="card-subscInput optionInput" data-id="4" required="" value="4">
                                    <label class="card-subscLabel">
                                        <div class="card-body">
                                            <div class="radioCircle">
                                                <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                            </div>
                                            <div class="info months">
                                                <h5 class="card-title">{{__('Year')}}</h5>
                                                <p class="option_price" id="option_price_4">{{$third_plan->discount_year}}
                                                    {{__('USD')}}</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div style="padding: .8rem 1rem 0;">

                            <h3 class="modal-title" id="exampleModalLongTitle"> {{__('Choose a payment method')}} </h3>
                        </div>

                        <div class="container">
                            <div class="row no-gutters">
                                <div class="col-md-4 text-center">
                                    <div class="card-subsc">
                                        <input class="card-subscInput" type="radio" name="type" required="" checked="" value="onlinePayment">
                                        <label class="card-subscLabel">
                                            <div class="card-body" style="display:block;padding:0.5rem 2rem">
                                                <div class="radioCircle">
                                                    <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                                </div>
                                                <div class="info">
                                                    <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Credit Card')}}</h5>
                                                    <img class="img-responsive w-100" src="{{asset('photo/onlinePay.png')}}" height="50">
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-4   text-center">
                                    <div class="card-subsc">
                                        <input class="card-subscInput" type="radio" name="type" required="" value="bankTransfer">
                                        <label class="card-subscLabel">
                                            <div class="card-body" style="display:block; padding:0.5rem 2rem">
                                                <div class="radioCircle">
                                                    <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                                </div>
                                                <div class="info">
                                                    <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Bank transfer')}}</h5>
                                                    <img class="img-responsive" src="{{asset('photo/bankTransfer.jpg')}}" height="50">
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-4   text-center">
                                    <div class="card-subsc">
                                        <input class="card-subscInput" type="radio" name="type" required="" value="payPal">
                                        <label class="card-subscLabel">
                                            <div class="card-body" style="display:block; padding:0.5rem 2rem">
                                                <div class="radioCircle">
                                                    <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                                </div>
                                                <div class="info">
                                                    <h5 class="card-title" style="margin:10px 0 10px 0;">{{__('Paypal')}}</h5>
                                                    <img class="img-responsive" src="{{asset('photo/paypal.png')}}" height="50">
                                                </div>
                                            </div>
                                        </label>
                                    </div>

                                </div>

                            </div>
                        </div>
                        {{--      <div class="modal-body">
                                  <h3 class="modal-title" style="margin-top: 1rem"> {{__('Other services')}} </h3>

                                  <div class="card-bar-title" style="padding: 10px 10px;
                                       border-radius: 5px;
                                       font-size: 15px;">
                                        {{__('SMSA bills of lading')}}
                                  </div>
                                  <div class="card-subsc-policis" style="display:flex;">

                                      <div class="card-subsc">
                                          <input class="card-subscInput" type="radio" name="smsa_policies" id="radio1" value="10">
                                          <label class="card-subscLabel">
                                              <div class="card-body">
                                                  <div class="radioCircle">
                                                      <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                                  </div>
                                                  <div class="info months">
                                                      <h5 class="card-title" style="text-align:center;">10
                                                          {{__('policy')}} </h5>
                                                      <p>280 {{__('USD')}}</p>
                                                  </div>
                                              </div>
                                          </label>
                                      </div>

                                      <div class="card-subsc">
                                          <input class="card-subscInput" type="radio" name="smsa_policies" id="radio2" value="50">
                                          <label class="card-subscLabel">
                                              <div class="card-body">
                                                  <div class="radioCircle">
                                                      <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                                  </div>
                                                  <div class="info months">
                                                      <h5 class="card-title" style="text-align:center;">50
                                                          {{__('policy')}} </h5>
                                                      <p>1400 {{__('USD')}}</p>
                                                  </div>
                                              </div>
                                          </label>
                                      </div>
                                      <div class="card-subsc">
                                          <input class="card-subscInput" type="radio" name="smsa_policies" id="radio3" value="100">
                                          <label class="card-subscLabel">
                                              <div class="card-body">
                                                  <div class="radioCircle">
                                                      <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                                  </div>
                                                  <div class="info months">
                                                      <h5 class="card-title" style="text-align:center;">100
                                                          {{__('policy')}} </h5>
                                                      <p>2800 {{__('USD')}}</p>
                                                  </div>
                                              </div>
                                          </label>
                                      </div>

                                  </div>

                                  <div class="card-bar-title" style="padding: 10px 10px;
                                       border-radius: 5px;
                                       font-size: 15px;">
                                      {{__('Domain reservation')}}
                                  </div>

                                  <div class="card-subsc" style="max-width:225px;cursor:pointer!important;">
                                      <input class="card-subscInput" type="checkbox" name="domain" id="radioDomain" style="    position: absolute;
                                          top: -7px;
                                          right: 0;
                                          left: 0;
                                          bottom: 0;
                                          width: 100%;
                                          height: 100%;
                                          opacity: 0;    z-index: 222;    cursor: pointer;">
                                      <label class="card-subscLabel">
                                          <div class="card-body">
                                              <div class="radioCircle" style="    position: absolute;
                                                  right: 3px;
                                                  top: 2px;">
                                                  <img src="{{asset('photo/checkM.svg')}}" alt="" class="img-responsive" height="50">
                                              </div>
                                              <div class="info">
                                                  <h5 class="card-title" style="text-align:center;"></h5>
                                                  <p style="margin: 5px 0;">99 {{__('USD')}}</p>
                                              </div>
                                          </div>
                                      </label>
                                  </div>

                              </div>--}}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success bg-purple" style="border-radius: 3px;margin: 0 0 0 0;padding: 10px 40px;color:#fff;font-size: 16px; border-color:#ffffff;width: 100%;
                                    max-width: 35%;">
                                {{__('Subscription')}}
                            </button>


                        </div>
                    </div>
                </form>

            </div>
    </div>
        <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <script>
        var e = document.getElementById("filt-monthly"),
            d = document.getElementById("filt-yearly"),
            t = document.getElementById("switcher"),
            m = document.getElementById("monthly"),
            y = document.getElementById("yearly");

        e.addEventListener("click", function () {
            t.checked = false;
            e.classList.add("toggler--is-active");
            d.classList.remove("toggler--is-active");
            m.classList.remove("hide");
            y.classList.add("hide");
        });

        d.addEventListener("click", function () {
            t.checked = true;
            d.classList.add("toggler--is-active");
            e.classList.remove("toggler--is-active");
            m.classList.add("hide");
            y.classList.remove("hide");
        });

        t.addEventListener("click", function () {
            d.classList.toggle("toggler--is-active");
            e.classList.toggle("toggler--is-active");
            m.classList.toggle("hide");
            y.classList.toggle("hide");
        })
    </script>

    <script>
        var ee = document.getElementById("filt-monthly-two"),
            dd = document.getElementById("filt-yearly-two"),
            tt = document.getElementById("switcher-two"),
            mm = document.getElementById("monthly-two"),
            yy = document.getElementById("yearly-two");

        ee.addEventListener("click", function () {
            tt.checked = false;
            ee.classList.add("toggler--is-active");
            dd.classList.remove("toggler--is-active");
            mm.classList.remove("hide");
            yy.classList.add("hide");

        });

        dd.addEventListener("click", function () {
            tt.checked = true;
            dd.classList.add("toggler--is-active");
            ee.classList.remove("toggler--is-active");
            mm.classList.add("hide");
            yy.classList.remove("hide");
        });

        tt.addEventListener("click", function () {
            dd.classList.toggle("toggler--is-active");
            ee.classList.toggle("toggler--is-active");
            mm.classList.toggle("hide");
            yy.classList.toggle("hide");

        })

    </script>
    <script>
        var ee4 = document.getElementById("filt-monthly-4"),
            dd4 = document.getElementById("filt-yearly-4"),
            tt4 = document.getElementById("switcher-4"),
            mm4 = document.getElementById("monthly-4"),
            yy4 = document.getElementById("yearly-4");

        ee4.addEventListener("click", function () {
            tt4.checked = false;
            ee4.classList.add("toggler--is-active");
            dd4.classList.remove("toggler--is-active");
            mm4.classList.remove("hide");
            yy4.classList.add("hide");

        });

        dd4.addEventListener("click", function () {
            tt4.checked = true;
            dd4.classList.add("toggler--is-active");
            ee4.classList.remove("toggler--is-active");
            mm4.classList.add("hide");
            yy4.classList.remove("hide");
        });

        tt4.addEventListener("click", function () {
            dd4.classList.toggle("toggler--is-active");
            ee4.classList.toggle("toggler--is-active");
            mm4.classList.toggle("hide");
            yy4.classList.toggle("hide");

        })

    </script>
    <script>
        var ee5 = document.getElementById("filt-monthly-5"),
            dd5 = document.getElementById("filt-yearly-5"),
            tt5 = document.getElementById("switcher-5"),
            mm5 = document.getElementById("monthly-5"),
            yy5 = document.getElementById("yearly-5");

        ee5.addEventListener("click", function () {
            tt5.checked = false;
            ee5.classList.add("toggler--is-active");
            dd5.classList.remove("toggler--is-active");
            mm5.classList.remove("hide");
            yy5.classList.add("hide");

        });

        dd5.addEventListener("click", function () {
            tt5.checked = true;
            dd5.classList.add("toggler--is-active");
            ee5.classList.remove("toggler--is-active");
            mm5.classList.add("hide");
            yy5.classList.remove("hide");
        });

        tt5.addEventListener("click", function () {
            dd5.classList.toggle("toggler--is-active");
            ee5.classList.toggle("toggler--is-active");
            mm5.classList.toggle("hide");
            yy5.classList.toggle("hide");

        })

    </script>
    <script>
        var eeee = document.getElementById("filt-monthly-1"),
            dddd = document.getElementById("filt-yearly-1"),
            tttt = document.getElementById("switcher-1"),
            mmmm = document.getElementById("monthly-1"),
            yyyy = document.getElementById("yearly-1");

        eeee.addEventListener("click", function () {
            tttt.checked = false;
            eeee.classList.add("toggler--is-active");
            dddd.classList.remove("toggler--is-active");
            mmmm.classList.remove("hide");
            yyyy.classList.add("hide");

        });

        dddd.addEventListener("click", function () {
            tttt.checked = true;
            dddd.classList.add("toggler--is-active");
            eeee.classList.remove("toggler--is-active");
            mmmm.classList.add("hide");
            yyyy.classList.remove("hide");
        });

        tttt.addEventListener("click", function () {
            dddd.classList.toggle("toggler--is-active");
            eeee.classList.toggle("toggler--is-active");
            mmmm.classList.toggle("hide");
            yyyy.classList.toggle("hide");

        })

    </script>
    <script>
        var eee = document.getElementById("filt-monthly-2"),
            ddd = document.getElementById("filt-yearly-2"),
            ttt = document.getElementById("switcher-2"),
            mmm = document.getElementById("monthly-2"),
            yyy = document.getElementById("yearly-2");

        eee.addEventListener("click", function () {
            ttt.checked = false;
            eee.classList.add("toggler--is-active");
            ddd.classList.remove("toggler--is-active");
            mmm.classList.remove("hide");
            yyy.classList.add("hide");

        });

        ddd.addEventListener("click", function () {
            ttt.checked = true;
            ddd.classList.add("toggler--is-active");
            eee.classList.remove("toggler--is-active");
            mmm.classList.add("hide");
            yyy.classList.remove("hide");
        });

        ttt.addEventListener("click", function () {
            ddd.classList.toggle("toggler--is-active");
            eee.classList.toggle("toggler--is-active");
            mmm.classList.toggle("hide");
            yyy.classList.toggle("hide");

        })

    </script>
    <script>
        // $('.subscribe-modal-view form').on('click', function() {
        //     $('.subscribe-modal-view').modal("hide");
        // })
        $(document).ready(function () {
            $(".card-subsc-policis .card-subscInput").click(function () {
                // Get the storedValue
                var previousValue = $(this).data('storedValue');
                if (previousValue) {
                    $(this).prop('checked', !previousValue);
                    $(this).data('storedValue', !previousValue);
                } else {
                    $(this).data('storedValue', true);
                    $(".card-subsc-policis .card-subscInput:not(:checked)").data("storedValue", false);
                }
            });
        });
    </script>
@endsection

@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA==" crossorigin="anonymous" />
<style>
    .store-prepare-item .card-text{
        min-height: 50px;

    }
</style>
    @if(App::isLocale('en'))
        <!-- BEGIN: Vendor CSS-->
{{--        <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/vendors/css/charts/apexcharts.css">--}}
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
        <!-- END: Vendor CSS-->



        <!-- BEGIN: Page CSS-->
{{--        <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/pages/dashboard-ecommerce.css">--}}
{{--        <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css/plugins/charts/chart-apex.css">--}}
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
        <!-- END: Page CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />



    @else
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Page CSS-->
{{--        <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css-rtl/pages/dashboard-ecommerce.css">--}}
{{--        <link rel="stylesheet" type="text/css" href="{{asset('')}}app-assets/css-rtl/plugins/charts/chart-apex.css">--}}
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/plugins/extensions/ext-component-toastr.css')}}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">
        <!-- END: Custom CSS-->
    @endif
    <style>
        .store-prepare-item {
            text-align: center;
        }
        .store-prepare-item img {
            max-width: 100%;
            display: block;
            margin: 0 auto 25px;
            height: 85px;
        }
        .done-setting {
            background-color: #3cd8a6 !important;
            border: none !important;
        }
        .bg-purple {
            background-color: #393ba7;
            background: linear-gradient(to left, rgba(111, 113, 205, 0.95) 0%, rgba(70, 72, 159, 0.95) 90%);
            border-color: #393ba7;
            color: #fff !important;
        }
        .text-white {
            color: #fff !important;
        }
        .avatar-title {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #fff;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 75%;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 75%;
        }
        .avatar-sm {
            height: 3.25rem;
            width: 3.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        html body p {
            line-height: 1.5rem;
            font-size: 1.1rem;
        }
    </style>
    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->


                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <!-- block -->
                        </div>

                        <!-- end page title -->
                        @if ( now() <= Auth::user()->created_at->addDays(10))
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">{{__('Set up the store for the first time')}}</h4>
                                </div>
                            </div>
                        </div>

                            <div class="row">

                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-body store-prepare-item">
                                        <img src="{{asset('photo/store.png')}}" alt="">
                                        <h5 class="card-title">{{__('Set up your store')}}</h5>
                                        <p class="card-text">{{__('Prepare your store to be ready (logo, name, description)')}}</p>


                                        <a href="{{route('setting.index')}}" class="btn btn-success waves-effect waves-light cursor-none done-setting">
                                            <span class="fas fa-check-circle"></span>
                                            {{__('Settings')}}
                                        </a>
                                    </div>
                                </div> <!-- end col-->

                                    <div class="col-md-6 col-xl-3">
                                        <div class="card card-body store-prepare-item">
                                            <img src="{{asset('photo/order.png')}}" alt="">
                                            <h5 class="card-title">{{__('Add products')}}</h5>
                                            <p class="card-text">{{__('Add your products to be ready for sale in the store')}}</p>
                                            <a href="{{route('product.index')}}" class="btn btn-success waves-effect waves-light cursor-none done-setting">
                                                <span class="fas fa-check-circle"></span>
                                                {{__('Show Products')}}
                                            </a>
                                        </div>
                                    </div> <!-- end col-->



                                    <div class="col-md-6 col-xl-3">
                                        <div class="card card-body store-prepare-item">
                                            <img src="{{asset('photo/delivery-truck.png')}}" alt="">
                                            <h5 class="card-title">{{__('Shipping options')}}</h5>
                                            <p class="card-text">{{__('Connect with shipping companies easily and in simple steps')}}</p>
                                            <a href="{{route('shipping.index')}}" class="btn btn-success waves-effect waves-light cursor-none done-setting">
                                                <span class="fas fa-check-circle"></span>
                                                {{__('View shipping options')}}
                                            </a>
                                        </div>
                                    </div> <!-- end col-->



                                    <div class="col-md-6 col-xl-3">
                                        <div class="card card-body store-prepare-item">
                                            <img src="{{asset('photo/cash.png')}}" alt="">
                                            <h5 class="card-title">{{__('payment methods')}} </h5>
                                            <p class="card-text"> {{__('Activate the payment gateway (Mada - Visa) and bank accounts')}} </p>

                                            <a href="{{route('payment.index')}}" class="btn btn-success waves-effect waves-light">
                                                <span class="fas fa-plus-circle"></span>
                                                {{__('Activate payment methods')}}
                                            </a>
                                        </div>
                                    </div> <!-- end col-->


                            </div>
                        @endif



                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <h4 class="page-title">{{__('Summary for month ')}} {{ now()->monthName}} </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-md-6 col-6 col-xl-3 ">
                                <div class="widget-rounded-circle card sm-padding">
                                    <div class="row card-body ">
                                        <div class="col-sm-4 col-12">
                                            <div class="avatar-lg">
                                                <img src="{{asset('photo/Icon-3.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-12">
                                            <div class=" widget-con">
                                                <h3 class="text-dark mt-1">

                                                    <span>{{number_format(array_sum($price_end),2,'.',',')}}</span>
                                                    <span> {{App::isLocale('en')?$country_store->country->currency_short:$country_store->country->currency_short_ar}}</span>
                                                </h3>
                                                <p class="text-muted mb-1 ">{{__('Sales')}}</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <div class="col-md-6 col-6 col-xl-3">
                                <div class="widget-rounded-circle card sm-padding">
                                    <div class="row card-body ">
                                        <div class="col-sm-4 col-12">
                                            <div class="avatar-lg">
                                                <img src="{{asset('photo/box-1.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-12">
                                            <div class=" widget-con">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$orders_month->count()}}</span>
                                                    <span style="font-weight: 400;font-size: 15px;">{{__('Order')}}</span>
                                                </h3>
                                                <p class="text-muted mb-1 ">{{__('Orders')}}</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <div class="col-md-6 col-6 col-xl-3">
                                <div class="widget-rounded-circle card sm-padding">
                                    <div class="row card-body ">
                                        <div class="col-sm-4 col-12">
                                            <div class="avatar-lg">
                                                <img src="{{asset('photo/money.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-12">
                                            <div class=" widget-con">
                                                <h3 class="text-dark mt-1">
                                                    <span>{{number_format($net_price,2,'.',',')}}</span>
                                                    <span>{{App::isLocale('en')?$country_store->country->currency_short:$country_store->country->currency_short_ar}}</span>
                                                </h3>
                                                <p class="text-muted mb-1 ">{{__('Net profit')}} </p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                            <div class="col-md-6 col-6 col-xl-3">
                                <div class="widget-rounded-circle card sm-padding">
                                    <div class="row card-body ">
                                        <div class="col-sm-4 col-12">
                                            <div class="avatar-lg">
                                                <img src="{{asset('photo/icon-11.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-12">
                                            <div class=" widget-con">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$users->count()}}</span>
                                                    <span style="font-weight: 400;font-size: 15px;">{{__('Client')}}</span>
                                                </h3>
                                                <p class="text-muted mb-1 ">{{__('Clients')}}</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="row card-body">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-purple rounded-circle">
                                                <i data-feather='box' class="avatar-title font-18 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-left">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$orders_new_month->count()}}</span>
                                                </h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('New Orders')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div >
                                        <span data-plugin="peity-bar" data-colors="#7275d2,#ebeff2" data-width="100%" data-height="45" style="display: none;">
                                            5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7
                                        </span>
                                        <svg class="peity" height="45" width="100%">
                                            <rect data-value="5" fill="#7275d2" x="1.1567703703703702" y="20" width="9.254162962962962" height="25"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="12.724474074074074" y="30" width="9.254162962962962" height="15"></rect>
                                            <rect data-value="9" fill="#7275d2" x="24.292177777777777" y="0" width="9.254162962962962" height="45"></rect>
                                            <rect data-value="6" fill="#ebeff2" x="35.85988148148148" y="15" width="9.254162962962958" height="30"></rect>
                                            <rect data-value="5" fill="#7275d2" x="47.42758518518518" y="20" width="9.254162962962965" height="25"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="58.995288888888886" y="0" width="9.254162962962958" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="70.5629925925926" y="10" width="9.254162962962965" height="35"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="82.13069629629628" y="30" width="9.25416296296298" height="15"></rect>
                                            <rect data-value="5" fill="#7275d2" x="93.69839999999998" y="20" width="9.25416296296298" height="25"></rect>
                                            <rect data-value="2" fill="#ebeff2" x="105.26610370370369" y="35" width="9.25416296296298" height="10"></rect>
                                            <rect data-value="9" fill="#7275d2" x="116.83380740740739" y="0" width="9.25416296296298" height="45"></rect>
                                            <rect data-value="7" fill="#ebeff2" x="128.4015111111111" y="10" width="9.254162962962994" height="35"></rect>
                                            <rect data-value="2" fill="#7275d2" x="139.9692148148148" y="35" width="9.254162962962994" height="10"></rect>
                                            <rect data-value="1" fill="#ebeff2" x="151.5369185185185" y="40" width="9.254162962962994" height="5"></rect>
                                            <rect data-value="3" fill="#7275d2" x="163.1046222222222" y="30" width="9.254162962962965" height="15"></rect>
                                            <rect data-value="5" fill="#ebeff2" x="174.67232592592592" y="20" width="9.254162962962965" height="25"></rect>
                                            <rect data-value="2" fill="#7275d2" x="186.24002962962965" y="35" width="9.254162962962909" height="10"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="197.80773333333332" y="0" width="9.254162962962937" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="209.37543703703705" y="10" width="9.254162962962937" height="35"></rect>
                                            <rect data-value="2" fill="#ebeff2" x="220.94314074074074" y="35" width="9.254162962962909" height="10"></rect>
                                            <rect data-value="5" fill="#7275d2" x="232.51084444444444" y="20" width="9.254162962962937" height="25"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="244.07854814814814" y="30" width="9.254162962962909" height="15"></rect>
                                            <rect data-value="9" fill="#7275d2" x="255.64625185185184" y="0" width="9.254162962962937" height="45"></rect>
                                            <rect data-value="6" fill="#ebeff2" x="267.2139555555555" y="15" width="9.254162962962937" height="30"></rect>
                                            <rect data-value="5" fill="#7275d2" x="278.78165925925924" y="20" width="9.254162962962937" height="25"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="290.34936296296297" y="0" width="9.25416296296288" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="301.91706666666664" y="10" width="9.254162962962937" height="35"></rect>
                                        </svg>
                                    </div>
                                </div> <!-- end card-box-->
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="row card-body">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-purple rounded-circle">
                                                <i data-feather='box' class="avatar-title font-18 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-left">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$canceled_month->count()}}</span>
                                                </h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('Orders Canceled')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div >
                                        <span data-plugin="peity-bar" data-colors="#7275d2,#ebeff2" data-width="100%" data-height="45" style="display: none;">
                                            5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7
                                        </span>
                                        <svg class="peity" height="45" width="100%">
                                            <rect data-value="5" fill="#7275d2" x="1.1567703703703702" y="20" width="9.254162962962962" height="25"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="12.724474074074074" y="30" width="9.254162962962962" height="15"></rect>
                                            <rect data-value="9" fill="#7275d2" x="24.292177777777777" y="0" width="9.254162962962962" height="45"></rect>
                                            <rect data-value="6" fill="#ebeff2" x="35.85988148148148" y="15" width="9.254162962962958" height="30"></rect>
                                            <rect data-value="5" fill="#7275d2" x="47.42758518518518" y="20" width="9.254162962962965" height="25"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="58.995288888888886" y="0" width="9.254162962962958" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="70.5629925925926" y="10" width="9.254162962962965" height="35"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="82.13069629629628" y="30" width="9.25416296296298" height="15"></rect>
                                            <rect data-value="5" fill="#7275d2" x="93.69839999999998" y="20" width="9.25416296296298" height="25"></rect>
                                            <rect data-value="2" fill="#ebeff2" x="105.26610370370369" y="35" width="9.25416296296298" height="10"></rect>
                                            <rect data-value="9" fill="#7275d2" x="116.83380740740739" y="0" width="9.25416296296298" height="45"></rect>
                                            <rect data-value="7" fill="#ebeff2" x="128.4015111111111" y="10" width="9.254162962962994" height="35"></rect>
                                            <rect data-value="2" fill="#7275d2" x="139.9692148148148" y="35" width="9.254162962962994" height="10"></rect>
                                            <rect data-value="1" fill="#ebeff2" x="151.5369185185185" y="40" width="9.254162962962994" height="5"></rect>
                                            <rect data-value="3" fill="#7275d2" x="163.1046222222222" y="30" width="9.254162962962965" height="15"></rect>
                                            <rect data-value="5" fill="#ebeff2" x="174.67232592592592" y="20" width="9.254162962962965" height="25"></rect>
                                            <rect data-value="2" fill="#7275d2" x="186.24002962962965" y="35" width="9.254162962962909" height="10"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="197.80773333333332" y="0" width="9.254162962962937" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="209.37543703703705" y="10" width="9.254162962962937" height="35"></rect>
                                            <rect data-value="2" fill="#ebeff2" x="220.94314074074074" y="35" width="9.254162962962909" height="10"></rect>
                                            <rect data-value="5" fill="#7275d2" x="232.51084444444444" y="20" width="9.254162962962937" height="25"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="244.07854814814814" y="30" width="9.254162962962909" height="15"></rect>
                                            <rect data-value="9" fill="#7275d2" x="255.64625185185184" y="0" width="9.254162962962937" height="45"></rect>
                                            <rect data-value="6" fill="#ebeff2" x="267.2139555555555" y="15" width="9.254162962962937" height="30"></rect>
                                            <rect data-value="5" fill="#7275d2" x="278.78165925925924" y="20" width="9.254162962962937" height="25"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="290.34936296296297" y="0" width="9.25416296296288" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="301.91706666666664" y="10" width="9.254162962962937" height="35"></rect>
                                        </svg>
                                    </div>
                                </div> <!-- end card-box-->
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="row card-body">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-purple rounded-circle">
                                                <i data-feather='box' class="avatar-title font-18 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-left">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$orders_complete_month->count()}}</span>
                                                </h3>
                                                <p class="text-muted mb-1 text-truncate">{{__('Completed Orders')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div >
                                        <span data-plugin="peity-bar" data-colors="#7275d2,#ebeff2" data-width="100%" data-height="45" style="display: none;">
                                            5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7
                                        </span>
                                        <svg class="peity" height="45" width="100%">
                                            <rect data-value="5" fill="#7275d2" x="1.1567703703703702" y="20" width="9.254162962962962" height="25"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="12.724474074074074" y="30" width="9.254162962962962" height="15"></rect>
                                            <rect data-value="9" fill="#7275d2" x="24.292177777777777" y="0" width="9.254162962962962" height="45"></rect>
                                            <rect data-value="6" fill="#ebeff2" x="35.85988148148148" y="15" width="9.254162962962958" height="30"></rect>
                                            <rect data-value="5" fill="#7275d2" x="47.42758518518518" y="20" width="9.254162962962965" height="25"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="58.995288888888886" y="0" width="9.254162962962958" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="70.5629925925926" y="10" width="9.254162962962965" height="35"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="82.13069629629628" y="30" width="9.25416296296298" height="15"></rect>
                                            <rect data-value="5" fill="#7275d2" x="93.69839999999998" y="20" width="9.25416296296298" height="25"></rect>
                                            <rect data-value="2" fill="#ebeff2" x="105.26610370370369" y="35" width="9.25416296296298" height="10"></rect>
                                            <rect data-value="9" fill="#7275d2" x="116.83380740740739" y="0" width="9.25416296296298" height="45"></rect>
                                            <rect data-value="7" fill="#ebeff2" x="128.4015111111111" y="10" width="9.254162962962994" height="35"></rect>
                                            <rect data-value="2" fill="#7275d2" x="139.9692148148148" y="35" width="9.254162962962994" height="10"></rect>
                                            <rect data-value="1" fill="#ebeff2" x="151.5369185185185" y="40" width="9.254162962962994" height="5"></rect>
                                            <rect data-value="3" fill="#7275d2" x="163.1046222222222" y="30" width="9.254162962962965" height="15"></rect>
                                            <rect data-value="5" fill="#ebeff2" x="174.67232592592592" y="20" width="9.254162962962965" height="25"></rect>
                                            <rect data-value="2" fill="#7275d2" x="186.24002962962965" y="35" width="9.254162962962909" height="10"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="197.80773333333332" y="0" width="9.254162962962937" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="209.37543703703705" y="10" width="9.254162962962937" height="35"></rect>
                                            <rect data-value="2" fill="#ebeff2" x="220.94314074074074" y="35" width="9.254162962962909" height="10"></rect>
                                            <rect data-value="5" fill="#7275d2" x="232.51084444444444" y="20" width="9.254162962962937" height="25"></rect>
                                            <rect data-value="3" fill="#ebeff2" x="244.07854814814814" y="30" width="9.254162962962909" height="15"></rect>
                                            <rect data-value="9" fill="#7275d2" x="255.64625185185184" y="0" width="9.254162962962937" height="45"></rect>
                                            <rect data-value="6" fill="#ebeff2" x="267.2139555555555" y="15" width="9.254162962962937" height="30"></rect>
                                            <rect data-value="5" fill="#7275d2" x="278.78165925925924" y="20" width="9.254162962962937" height="25"></rect>
                                            <rect data-value="9" fill="#ebeff2" x="290.34936296296297" y="0" width="9.25416296296288" height="45"></rect>
                                            <rect data-value="7" fill="#7275d2" x="301.91706666666664" y="10" width="9.254162962962937" height="35"></rect>
                                        </svg>
                                    </div>
                                </div> <!-- end card-box-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
{{--                                        <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">--}}
{{--                                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">--}}
{{--                                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">--}}
{{--                                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>--}}
{{--                                            </div>--}}
                                            <h4 class="header-title mb-3">
                                                {{__('Most Orders countries for a month')}} {{ now()->monthName}}
                                            </h4>

                                        <canvas id="chart1" height="336" width="505" style="display: block; width: 505px; height: 336px;" class="chartjs-render-monitor"></canvas>
                                    </div>




                                    </div> <!-- end card-box -->

                            </div> <!-- end col-->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body" style="overflow-x:hidden;">
                                        <h4 class="header-title mb-3">{{__('Orders for month ')}}{{ now()->monthName}}</h4>

                                        <canvas id="chart2" height="336" style="display: block; width: 505px; height: 336px;" width="505" class="chartjs-render-monitor"></canvas>



                                    </div> <!-- end card-box -->
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body h-orders-table " >
                                        <h4 class="header-title mb-3">{{__('Latest Orders')}}</h4>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-hover table-centered m-0">
                                                <thead class="thead-light" style="border:1px solid #dee2e6;">
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('Date')}}</th>
                                                    <th>{{__('Total')}}</th>
                                                    <th>{{__('Status')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders_last_10 as $order_last)
                                                <tr>
                                                    <td>
                                                        <h5 class="m-0 font-weight-normal">{{$order_last->order_no}}</h5>
                                                    </td>
                                                    <td title="{{__('Order Time')}} : {{$order_last->created_at}}">
                                                        {{$order_last->created_at->diffForHumans()}}
                                                    </td>
                                                    <td>
                                                        {{$order_last->total_price}}
                                                    </td>
                                                    <td>
                                                        @if ($order_last->status ==0)
                                                            <span  class="btn btn-info">{{__("New")}}</span>
                                                        @endif
                                                        @if ($order_last->status ==1)
                                                            <span  class="btn btn-dark">{{__("Processing")}}</span>
                                                        @endif
                                                        @if ($order_last->status ==2)
                                                            <span  class="btn btn-secondary">{{__("Ready to ship")}}</span>
                                                        @endif
                                                        @if ($order_last->status ==3)
                                                            <span  class="btn btn-warning">{{__("Delivering")}}</span>
                                                        @endif
                                                        @if ($order_last->status ==4)
                                                            <span  class="btn btn-success">{{__("Delivered")}}</span>
                                                        @endif
                                                        @if ($order_last->status ==5)
                                                            <span  class="btn btn-danger">{{__("Rejected")}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('order.show',$order_last->id)}}" target="_blank" >
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div> <!-- end .table-responsive-->
                                    </div> <!-- end card-box-->

                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->


                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

{{--    <script src="{{asset('')}}app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>--}}
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script>

    var ctx1 = document.getElementById('chart1');

    Chart.pluginService.register({
        beforeDraw: function (chart) {
            if (chart.config.options.elements.center) {
                //Get ctx from string
                var ctx = chart.chart.ctx;

                //Get options from the center object in options
                var centerConfig = chart.config.options.elements.center;
                var fontStyle = centerConfig.fontStyle || 'Arial';
                var txt = centerConfig.text;
                var color = centerConfig.color || '#000';
                var sidePadding = centerConfig.sidePadding || 20;
                var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
                //Start with a base font of 30px
                ctx.font = "30px " + fontStyle;

                //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
                var stringWidth = ctx.measureText(txt).width;
                var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

                // Find out how much the font can grow in width.
                var widthRatio = elementWidth / stringWidth;
                var newFontSize = Math.floor(30 * widthRatio);
                var elementHeight = (chart.innerRadius * 2);

                // Pick a new font size so it will not be larger than the height of label.
                var fontSizeToUse = 16;

                //Set font settings to draw it correctly.
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
                var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
                ctx.font = fontSizeToUse + "px " + fontStyle;
                ctx.fillStyle = color;

                //Draw text in center
                ctx.fillText(txt, centerX, centerY);
            }
        }
    });

    var myChart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    @if($orders_country->count() ==0)
                    1
                    @endif
                    @if($orders_country->count() >0)
                    @foreach( $orders_country as $order)
                    @foreach($order as $item)
                    @if ($loop->first)
                    {{$item->order_address->country_id}},
                    @endif
                    @endforeach
                    @endforeach
                    @endif
                ],
                backgroundColor: [
                    "#096d3e",
                    "#d8c33c",
                    "#E30A0A",
                    "#1014b1",
                    "#d83cd5",
                ],
                // hoverOffset: 4,
                label: ''
            }],
            labels: [
                @if($orders->count()==0)
                    '{{__('There are no orders for this month')}}'
                @else
                    @foreach ($orders_country as $order)
                    @foreach($order as $item)
                    @if ($loop->first)
                    "{{App::isLocale('en') ?$item->order_address->country->name:$item->order_address->country->name_ar}}",
                @endif
                @endforeach
                @endforeach
                @endif
            ]
        },
        options: {
            responsive: true,
            cutoutPercentage: 85,
            elements: {
                center: {
                    text: '{{__('Orders This Month')}}',
                    color: '#323a46', // Default is #000000
                    // fontStyle: 'SSTArabic-Roman', // Default is Arial
                    sidePadding: 20 // Defualt is 20 (as a percentage)
                }
            },
            legend: {
                position: 'bottom',

                labels: {
                    boxWidth: 10,
                    // fontFamily: 'SSTArabic-Roman',
                }
            },
            title: {
                display: false,
                text: 'Chart.js Doughnut Chart'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            tooltips: {
                enabled: false,
                callbacks: {
                    title: function () {
                    },
                },
                displayColors: false,
            },
        }
    });



</script>
    <script>



        var myLineChart = new Chart(document.getElementById('chart2').getContext('2d'), {
            type: 'line',
            data: {
                datasets: [{
                    data: [
                        @foreach( $orders_month as $item)
                        {{$loop->iteration}},
                        @endforeach
                    ],
                    backgroundColor: '#06a05b ',
                    label: ' {{__('Number Orders')}} ',
                    showLine: true,
                    lineTension: 0,
                    borderColor: '#096d3e'
                }],
                labels: [@foreach( $orders_month as $item)
                    {{$item->created_at->format('d')}},
                    @endforeach]
            },
            options: {
                responsive: true,
                cutoutPercentage: 85,
                elements: {
                    center: {
                        text: '',
                        color: '#000000', // Default is #000000
                        fontStyle: 'SSTArabic-Roman', // Default is Arial
                        sidePadding: 20 // Defualt is 20 (as a percentage)

                    }
                },
                tooltips: {
                    callbacks: {
                        title: function () {
                        }
                    },
                    displayColors: false,
                },
                legend: {
                    position: 'bottom',


                    labels: {
                        boxWidth: 10,
                        fontFamily: 'SSTArabic-Roman',

                    }
                },
                title: {
                    display: false,
                    text: 'Chart.js Line Chart'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
                scales: [
                    {
                        ticks: {
                            stepSize: 1
                        }
                    }

                ]
            }
        });

    </script>
@endsection

@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA==" crossorigin="anonymous" />
    <style>
        .order-view-header h5 {
            color: #949292;
            font-size: 15px;
            font-weight: 700;
        }

        .order-view-header p {
            color: #6c757d;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 8px;
        }

        @media(max-width: 767px) {
            .order-view-header .text-right {    text-align: right !important;};
        }
        .orderUserInfo {
            min-height: 198px;
        }


        .orderUserInfo h5 {
            color: #949798;
            padding: 12px 8px;
            background: #f4f5f7;
            font-weight: 700;
        }

        .orderUserInfo h4 {
            color: #949798 ;
            font-size: 14px;

        }

        .orderUserInfo p {

            color: #949798;
            font-size: 14px;
        }

        .orderUserInfo i {
            font-size: 18px;
            color: #6658dd;
            vertical-align: middle;
        }

        .orderStatus {
            list-style: none;
            text-align: center;
        }

        .orderStatus li {
            display: inline-block;
        }

        .orderStatus li a {
            background: #f3f4f6 !important;
            border-color: #f3f4f6 !important;
            color: #333 !important;
            border-radius: 5px;
        }

        @media(max-width:767px) {
            .orderStatus li {
                float:right;

            }
        }

        .orderStatus li.active a {
            background: linear-gradient(to left, rgb(40 199 111) 0%, rgb(100 214 151) 90%) !important;
            color: #fff !important;
            background-color: #28c76f !important;
            border-color: #28c76f !important;
            box-shadow: 0 0 10px rgb(92 93 95 / 40%);
        }


        .nav-second-level li a,
        .nav-third-level li a {
            color: #fff !important;
        }


        .add-orders-wizard .nav-item span {
            display: block !important;
            font-size: 14px;
        }
        .avatar-lg {
            height: 4.5rem;
            width: 4.5rem;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Show Order')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('order.index')}}">{{__('Orders')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Show Order')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- brand edit start -->
                <section class="app-coupon-edit">

                    <div class="row">
                        <div class="  col-12  ">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Status Order')}}</h5>
                                    <ul class="orderStatus">
                                        <li title="{{__("Status Update")}}" class="mr-1 {{$order->status ==0?'active':''}}">
                                            <a href="#" data-id="{{$order->id}}" data-status="0" data-next="processing" id="btn_new" class="btn btn-success btn-rounded sa-params statusBtn">
                                                {{__("New")}}
                                            </a>
                                        </li>
                                        <li title="{{__("Status Update")}}" class="mr-1 mb-2 {{$order->status ==1?'active':''}}">
                                            <a href="#" data-id="{{$order->id}}" data-status="1" data-next="ready" id="btn_processing" class="btn btn-success btn-rounded sa-params statusBtn">
                                                {{__("Processing")}}
                                            </a>
                                        </li>

                                        <li title="{{__("Status Update")}}" class="mr-1 mb-2 {{$order->status ==2?'active':''}}">
                                            <a href="#" data-id="{{$order->id}}" data-status="2" data-next="delivering" id="btn_ready" class="btn btn-success btn-rounded sa-params statusBtn">
                                                {{__("Ready to ship")}}
                                            </a>
                                        </li>
                                        <li title="{{__("Status Update")}}" class="mr-1 mb-2 {{$order->status ==3?'active':''}}">
                                            <a href="#" data-id="{{$order->id}}" data-status="3" data-next="completed" id="btn_delivering" class="btn btn-success btn-rounded sa-params statusBtn">
                                                {{__("Delivering")}}
                                            </a>
                                        </li>
                                        <li title="{{__("Status Update")}}" class="mr-1 mb-2 {{$order->status ==4?'active':''}}">
                                            <a href="#" data-id="{{$order->id}}" data-status="4" data-next="rejected" id="btn_completed" class="btn btn-success btn-rounded sa-params statusBtn">
                                                {{__("Delivered")}}
                                            </a>
                                        </li>
                                        <li title="{{__("Status Update")}}" class="mr-1 mb-2 {{$order->status ==5?'active':''}}">
                                            <a href="#" data-id="{{$order->id}}" data-status="5" data-next="new" id="btn_rejected" class="btn btn-success btn-rounded sa-params statusBtn">إلغاء
                                                {{__("Rejected")}}
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body order-view-header">
                                            <div class="row">
                                                <div class="col-md-4 col-6">
                                                    <h5 class="card-title">{{__('Order No')}}</h5>
                                                    <p class="card-text">#{{$order->order_no}}</p>
                                                </div>
                                                <div class="col-md-3 col-6 text-center">
                                                    <h5 class="card-title">
                                                        <i class=" mdi mdi-calendar-clock"></i>
                                                        {{__('Order Date')}}
                                                    </h5>
                                                    <p class="card-text">
                                                        {{$order->created_at->format('d/m/Y').'-'.$order->created_at->format('D')}}
                                                    </p>
                                                    <p class="card-text"> {{__('Time :')}}
                                                        {{$order->created_at->format('h:s A')}}
                                                    </p>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                </div>
                                                <div class="col-md-2 col-12 text-right">
                                                    <div class="inline_bb">
                                                        <h5 id="order_sts" class="card-title">
                                                            <i class=" mdi mdi-flag"></i>
                                                            {{__('Status Order')}}
                                                        </h5>

                                                        @if ($order->status ==0)
                                                            <span  class="btn btn-info">{{__("New")}}</span>
                                                        @endif
                                                        @if ($order->status ==1)
                                                            <span  class="btn btn-primary">{{__("Processing")}}</span>
                                                        @endif
                                                        @if ($order->status ==2)
                                                            <span  class="btn btn-secondary">{{__("Ready to ship")}}</span>
                                                        @endif
                                                        @if ($order->status ==3)
                                                            <span  class="btn btn-warning">{{__("Delivering")}}</span>
                                                        @endif
                                                        @if ($order->status ==4)
                                                            <span  class="btn btn-success">{{__("Delivered")}}</span>
                                                        @endif
                                                        @if ($order->status ==5)
                                                            <span  class="btn btn-danger">{{__("Rejected")}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-body align-items-center orderUserInfo" style="min-height: 256px;">
                                @if ($order->user->photo != null)
                                <img src="{{asset('uploads/user/').'/'.$order->user->photo }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                @else
                                    <img src="{{asset('photo/default.png')}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                @endif

                                <h4 class="mb-0">{{__('Client Name')}} :{{$order->user->name ??''}}</h4>
                                <div class="text-left mt-3">

                                    <span class="font-13" style="display:block;">
                                        <i class="  mdi mdi-phone mr-2"></i>{{__('Mobile')}} :
                                        <a href="tel:+{{$order->user->mobile}}" target="_blank">  {{$order->user->mobile}} </a>
                                    </span>
                                    <span class="font-13" style="display:block;">
                                        <i class="  mdi mdi-email mr-2"></i> {{__('Email')}}:
                                        <a href="mailto:{{$order->user->email}}" target="_blank">  {{$order->user->email}}</a>
                                    </span>
                                    <span class="font-13" style="display:block;">
                                    <i class=" mdi mdi-whatsapp mr-2"></i>{{__('Whatsapp')}} :
                                    <a href="https://api.whatsapp.com/send?phone={{$order->user->mobile}}" target="_blank" style="direction: ltr">
                                        <span style="text-align: left">{{$order->user->mobile}}</span>
                                    </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-body orderUserInfo" style="min-height: 256px;!important; padding-bottom:0;">
                                <h5 class="card-title">
                                    {{__('Shipping Method')}}
                                    <img style="float: left" width="50px" src="https://mapp.sa/uploads/general/2020_03_10_03_14_16_58551.png" class="image-responsive" alt="لا يتطلب شحن">
                                    <div class="clear"></div>
                                    <p title="{{__('Shipping Co.')}}" style="display:inline-block;" class="mt-3 mb-0">
                                        {{__('Shipping Co.')}} : {{App::isLocale('en')?$order->shipping->name:$order->shipping->name_ar}}
                                    </p>
                                </h5>
                                <a style="font-weight: normal;font-size:14px;margin-bottom:10px;" title="{{__('Country')}}">{{__('Country')}} :
                                    <span class="text-left">{{$order->order_address->country->name}}</span>
                                </a>
                                <a style="font-weight: normal;font-size:14px;margin-bottom:10px;" title="{{__('City')}}">{{__('City')}} :
                                     <span class="text-left">{{$order->order_address->city->name}}</span>
                                </a>
                                <a style="font-weight: normal;font-size:14px;margin-bottom:10px;" title="{{__('Address')}}">{{__('Address')}} :
                                    <span class="text-left">{{$order->order_address->details}}</span>
                                </a>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-body orderUserInfo" style="min-height: 256px;!important;">
                                <h5 class="card-title" style="line-height: 33px;">{{__('Payment Method')}}
                                    <div class="clear"></div>
                                </h5>
                                <h4>
                                    <p style="margin-bottom:5px;">{{$order->payment? App::isLocale('en')?$order->payment->name:$order->payment->name_ar:__('Payment upon delivery')}}</p>
                                </h4>
                                @if($order->payment->type==4 || $order->payment->type==5)
                                <button id="transaction" data-toggle="modal" data-target="#transactionModal" class="btn btn-success waves-effect waves-light ">
                                    {{__('Show Transaction')}}
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Products')}}</h5>
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>{{__('Product')}}</th>
                                                <th>{{__('Quantity')}}</th>
                                                <th>{{__('Price')}}</th>
                                                <th>{{__('Total Price')}}</th>
                                                <th>{{__('Additional Data')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order->details as $item)
                                            <tr>

                                                <td>
                                                    <a target="_blank" href="{{route('product.edit',$item->product->id)}}">
                                                        <img src="{{asset('uploads/products/'.$item->product->cover_image)}}" alt="Product Image" height="32"> {{$item->product->name}} </a>
                                                </td>
                                                <td>{{$item->quantity}} </td>
                                                <td>{{$item->price}} {{$order->currency->currency_short_ar}}</td>
                                                <td>{{$item->total_price}} {{$order->currency->currency_short_ar}}</td>
                                                <td class="justify-content-center">
                                                    {{-- {{$item->product_option->name}} : {{$item->value_option->name}} --}}
                                                </td>

                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{__('Order Notes')}}</h5>
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td colspan="2" style="background-color: #fff;box-shadow: 0px 6px 20px rgba(115, 116, 182, 0.09)">
                                                {{$order->notes}}

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>
                                                {{__('Total price of the products')}}
                                            </th>
                                            <td>
                                                {{$order->price}} {{$order->currency->currency_short_ar}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>
                                                {{__('Shipping')}}
                                            </th>
                                            <td>
                                                {{$order->shipping->price}} {{$order->currency->currency_short_ar}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{__('Discount Coupon')}}
                                                @if ($order->use_coupon)
                                                <span class="badge badge-primary"><b>{{$order->use_coupon->coupon->code}}</b></span>

                                                @endif
                                            </th>
                                            <td>
                                                @if ($order->use_coupon)
                                                    @if ($order->use_coupon->type ==2)
                                                        {{$order->use_coupon->coupon_value}} {{$order->currency->currency_short_ar}}
                                                    @endif
                                                        @if ($order->use_coupon->type ==1)
                                                            {{$order->use_coupon->coupon_value}}%
                                                        @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>{{__('Total')}} </span>
                                            </td>
                                            <td>
                                                <span><b style="color: #6658dd;">{{$order->total_price}} {{$order->currency->currency_short_ar}} </b></span>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-4 mb-1" style="margin-top: -18px !important;">
                        <div class="text-left d-print-none" style="text-align: center!important;">
                            <div style="display: none">
                                <div id="test"> <style>

                                        @media (max-width: 520px) {
                                            table tr,
                                            table td,
                                            table td strong {
                                                font-size: 10px !important;
                                                padding-left: 5px;
                                            }
                                        }
                                    </style>
                                    <style>
                                        @media (max-width: 520px) {
                                            table tr,
                                            table td,
                                            table td strong {
                                                font-size: 10px !important;
                                                padding-left: 5px;
                                            }
                                        }

                                        @page  {
                                            size: auto;   /* auto is the initial value */
                                            margin: 0;  /* this affects the margin in the printer settings */
                                        }

                                        @media  print {
                                            img,
                                            tr {
                                                page-break-inside: avoid
                                            }


                                            *,
                                            :after,
                                            :before {
                                                background: 0 0 !important;
                                                color: #000 !important;
                                                box-shadow: none !important;
                                                text-shadow: none !important;
                                                font-size: 13px;
                                            }

                                            h1 {
                                                margin: .3rem 0;
                                            }

                                            thead {
                                                display: table-header-group
                                            }

                                            img {
                                                max-width: 100% !important
                                            }

                                            p {
                                                orphans: 3;
                                                widows: 3
                                            }

                                            .table {
                                                border-collapse: collapse !important
                                            }

                                            .table td,
                                            .table th {
                                                background-color: #fff !important
                                            }

                                            table td {
                                                padding-top: 5px;
                                            }

                                            .price-before {
                                                text-decoration: line-through;
                                                color: #bbb;
                                                padding: 0 0 0 8px;
                                            }

                                            .page {
                                                page-break-before: always;
                                            }
                                        }


                                        *,
                                        :after,
                                        :before {
                                            -webkit-box-sizing: border-box;
                                            -moz-box-sizing: border-box;
                                            box-sizing: border-box
                                        }

                                        .panel-body:after,
                                        .panel-body:before,
                                        .row:after,
                                        .row:before {
                                            content: " ";
                                            display: table
                                        }

                                        .panel-body:after,
                                        .row:after {
                                            clear: both
                                        }

                                        .price-before {
                                            text-decoration: line-through;
                                            color: #bbb;
                                            padding: 0 0 0 8px;
                                        }

                                        .page {
                                            page-break-before: always;
                                        }

                                        .produtctTableDetails td {
                                            border: 1px solid #edeff2;
                                        }
                                    </style>
                                    <div style="margin:0;padding:0;width:100%;background-color:#f2f4f6;">
                                        <table width="100%" cellpadding="0" cellspacing="0" dir="{{App::isLocale('en')?'ltr':'rtl'}}" align="center">
                                            <tbody>
                                            <tr>
                                                <td style="width:100%;margin:0;padding:0;background-color:#f2f4f6" align="center">
                                                    <table width="100%" cellpadding="0" cellspacing="0">


                                                        <tbody>
                                                        <tr>
                                                            <td style="padding:5px;text-align:center;background-color:#f2f4f6">
                                                                <br>
                                                                <img src="https://mapp.sa/uploads/stores/2021_04_10_02_05_27_20826.jpg" width="50">

                                                                <p style="direction:rtl;"><strong>{{Auth::user()->market_name}} </strong></p>
                                                                <h3 style=" "><strong>{{__('Order invoice number')}} : </strong>#{{$order->order_no}}</h3>
                                                                <table style="width:620px;max-width:620px;margin:0 auto;padding:0;margin-bottom:20px">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p style="direction:rtl;">
                                                                                <span style=""><strong>{{__('Order Time')}} : </strong></span>
                                                                                <span style="">{{$order->created_at->format('d/m/Y h:m A')}}</span>
                                                                            </p>

                                                                        </td>
                                                                        <td>
                                                                            <p style="direction:rtl ;">
                                                                                <span style=""><strong>{{__('Status Order')}} : </strong></span>
                                                                                @if ($order->status ==0)
                                                                                    <span id="invoice_status"  >{{__("New")}}</span>
                                                                                @endif
                                                                                @if ($order->status ==1)
                                                                                    <span id="invoice_status"  >{{__("Processing")}}</span>
                                                                                @endif
                                                                                @if ($order->status ==2)
                                                                                    <span id="invoice_status"  >{{__("Ready to ship")}}</span>
                                                                                @endif
                                                                                @if ($order->status ==3)
                                                                                    <span id="invoice_status"  >{{__("Delivering")}}</span>
                                                                                @endif
                                                                                @if ($order->status ==4)
                                                                                    <span id="invoice_status" >{{__("Delivered")}}</span>
                                                                                @endif
                                                                                @if ($order->status ==5)
                                                                                    <span  id="invoice_status" >{{__("Rejected")}}</span>
                                                                                @endif

                                                                            </p>
                                                                        </td>
                                                                        <td>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>


                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td style="width:100%;margin:0;padding:0;border-top:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff">

                                                                <table style="width:auto;max-width:570px;margin:0 auto;padding:0" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="width:100%;border-bottom:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff;padding-bottom:5px;margin-bottom:100px" align="center">
                                                                            <div style="margin-top: 15px;">
                                                                                <h1 style="font-weight: normal;">{{__('Payment and shipping information')}}</h1>
                                                                                <br>
                                                                                <table style="width:620px;max-width:620px;margin:0 auto;padding:0;margin-bottom:20px" align="center" cellpadding="0" cellspacing="0" border="0" class="light-border">

                                                                                    <tbody>
                                                                                    <tr>
                                                                                        @if (App::isLocale('ar'))
                                                                                            <th style="width:500px; vertical-align: top; font-size: 15px;"></th>
                                                                                        @endif
                                                                                        <td style="width:480px;">
                                                                                            <table style="width:480px;max-width:480px;margin:0 auto;padding:0;padding-bottom:10px;" align="{{App::isLocale('en')?'left':'right'}}" cellpadding="0" cellspacing="0" border="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <th align="right" style="font-size: 15px;">
                                                                                                        {{__('Name')}} :
                                                                                                    </th>
                                                                                                    <th align="right" style="font-size: 15px;">
                                                                                                        {{__('Mobile')}}
                                                                                                    </th>
                                                                                                    <th align="right" style="font-size: 15px;">
                                                                                                        {{__('Email')}}
                                                                                                    </th>
                                                                                                </tr>
                                                                                                <tr>

                                                                                                    <td align="right" style="">{{$order->user->name ??''}}</td>
                                                                                                    <td align="right" style="">{{$order->user->mobile ??''}}</td>
                                                                                                    <td align="right" style=""><a href="mailto:{{$order->user->email ??''}}" target="_blank">{{$order->user->email ??''}}</a></td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                        @if (App::isLocale('en'))
                                                                                            <th style="width:500px; vertical-align: top; font-size: 15px;"></th>
                                                                                        @endif
                                                                                    </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                                <table style="width:620px;max-width:620px;margin:0 auto;padding:0;margin-bottom:20px" align="center" cellpadding="0" cellspacing="0" border="0" class="light-border">

                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td style="width:200px;text-align:{{App::isLocale('en')?'left':'right'}};padding: 5px">
                                                                                            <strong style="font-size: 14px;">{{__('Shipping Address')}} :</strong></td>
                                                                                        <td style="width:460px;">
                                                                                            {{$order->order_address->country->name}}
                                                                                            {{$order->order_address->city->name}},
                                                                                            {{$order->order_address->details}},

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="width:200px;text-align:{{App::isLocale('en')?'left':'right'}};padding: 5px">
                                                                                            <strong style="font-size: 14px;">{{__('Shipping Method')}} : </strong></td>
                                                                                        <td style="width:460px;">{{$order->shipping->name}}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="width:200px;text-align:{{App::isLocale('en')?'left':'right'}};padding: 5px">
                                                                                            <strong style="font-size: 14px;margin-left: 7px;">{{__('Payment Method')}} : </strong></td>
                                                                                        <td style="width:460px;">
                                                                                            {{$order->payment? App::isLocale('en')?$order->payment->name:$order->payment->name_ar:__('Payment upon delivery')}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:100%;border-top:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff;padding-top:20px" align="center">
                                                                            <div>
                                                                                <h1 style="font-weight: normal;margin:0;">{{__('Product Details')}}</h1>
                                                                                <br><table style="width:570px;max-width:570px;margin:0 auto;padding:0 0 5px 0;" align="center" cellpadding="0" cellspacing="0" border="0">
                                                                                    <thead>

                                                                                    <tr>
                                                                                        <th align="{{App::isLocale('en')?'left':'right'}}" style="">{{__('Product')}}</th>
                                                                                        <th align="{{App::isLocale('en')?'left':'right'}}" style="">{{__('Product Code')}}</th>
                                                                                        <th align="{{App::isLocale('en')?'left':'right'}}" style="">{{__('Price')}}</th>
                                                                                        <th align="{{App::isLocale('en')?'left':'right'}}" style="">{{__('Quantity')}}</th>
                                                                                        <th align="center" style="">{{__('Total Price')}}</th>
                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        @foreach($order->details as $item)
                                                                                            <td style="padding: 0 0 0 20px;">
                                                                                                <p style="">{{$item->product->name}}</p>
                                                                                            </td>
                                                                                            <td style="padding: 0 0 0 20px;"><small style="">{{$item->product->code}}</small> </td>
                                                                                            <td style="padding: 0 0 0 20px;">{{$item->price}} {{$order->currency->currency_short_ar}} </td>
                                                                                            <td style="padding: 0 0 0 20px;">{{$item->quantity}} </td>
                                                                                            <td style="padding: 0 0 0 20px;">{{$item->total_price}} {{$order->currency->currency_short_ar}}</td>
                                                                                        @endforeach
                                                                                    </tr>


                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="width:100%;border-bottom:1px solid #edeff2;border-bottom:1px solid #edeff2;background-color:#fff;padding-bottom:5px;margin-bottom:100px" align="center">
                                                                            <div style="margin-top: 15px;">
                                                                                <h1 style="font-weight: normal;">{{__('Price details')}}</h1>
                                                                                <table style="width:570px;max-width:570px;margin:0 auto;padding:0;margin-bottom:20px;padding-bottom:10px;border-collapse: collapse;width: 100% !important;border:1px solid #edeff2;" align="center" cellpadding="0" cellspacing="0" class="produtctTableDetails">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td align="{{App::isLocale('en')?'left':'right'}}" style="padding: 10px">
                                                                                            <strong>{{__('Total price of the products')}}</strong>
                                                                                        </td>
                                                                                        <td align="{{App::isLocale('en')?'right':'left'}}" style="padding: 10px">
                                                                                            {{$order->price}} {{$order->currency->currency_short_ar}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="{{App::isLocale('en')?'left':'right'}} " style="padding: 10px">
                                                                                            <strong>{{__('Shipping')}}</strong></td>
                                                                                        <td align="{{App::isLocale('en')?'right':'left'}}" style="padding: 10px"> {{$order->shipping->price}} {{$order->currency->currency_short_ar}}
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td align="{{App::isLocale('en')?'left':'right'}}" style="padding: 10px">
                                                                                            <strong>
                                                                                                {{__('Discount Coupon')}}
                                                                                                @if ($order->use_coupon)
                                                                                                    <span class="badge badge-primary"><b>{{$order->use_coupon->coupon->code}}</b></span>
                                                                                                @endif
                                                                                            </strong>
                                                                                        </td>
                                                                                        <td align="{{App::isLocale('en')?'right':'left'}}" style="padding: 10px">
                                                                                            @if ($order->use_coupon)
                                                                                                @if ($order->use_coupon->type ==2)
                                                                                                    {{$order->use_coupon->coupon_value}} {{$order->currency->currency_short_ar}}
                                                                                                @endif
                                                                                                @if ($order->use_coupon->type ==1)
                                                                                                    {{$order->use_coupon->coupon_value}}%
                                                                                                @endif
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="{{App::isLocale('en')?'left':'right'}}" style="padding: 10px">
                                                                                            <strong>{{__('Total')}}</strong></td>
                                                                                        <td align="{{App::isLocale('en')?'right':'left'}}" style="padding: 10px">
                                                                                            {{$order->total_price}} {{$order->currency->currency_short_ar}}
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    </tbody>
                                                                </table>

                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td style="padding:20px 0;">
                                                                <table style="width:auto;max-width:570px;margin:0 auto;padding:0;text-align:center" align="center" cellpadding="0" cellspacing="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="color:#aeaeae;text-align:center">
                                                                            <p style="margin-top:0;color:#74787e;font-size:12px;line-height:1.5em">
                                                                            </p>
                                                                            <p><strong>{{__('Thank you for purchasing from  store')}} {{Auth::user()->market_name}}  </strong></p>

                                                                            <p></p>

                                                                            <p style="margin-top:0;color:#74787e;font-size:12px;line-height:1.5em">
                                                                                {{__('All rights reserved')}}
                                                                                &nbsp;
                                                                                <a style="color:#3869d4" href="#" target="_blank">{{Auth::user()->market_name}}  </a>
                                                                                © {{ now()->year }}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>
                            <a href="javascript:PrintElem()" class="btn btn-success waves-effect waves-light"><i class="fas fa-print mr-1 ml-1"></i>{{__('View Invoice')}}</a>

                        </div>
                    </div>
                </section>
                <!-- brand edit ends -->

            </div>
        </div>
    </div>
    @if($order->payment->type==4 || $order->payment->type==5)
    <div id="transactionModal" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Transaction')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{env('ATTACH_URL_LOZ'). $order->payment_attach}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                    </div>

            </div>
        </div>
    </div>
    @endif
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components/components-navs.js')}}"></script>
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
{{-- generate invoice--}}
    <script type="text/javascript">
        function PrintElem() {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>{{__('Order Invoice')}}</title>');
            mywindow.document.write('<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">');
            mywindow.document.write('</head><body >');
            // mywindow.document.write('<h1>' + document.title  + '</h1>');
            mywindow.document.write(document.getElementById('test').innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            // mywindow.print();
            //  mywindow.close();

            // return true;
        }
    </script>
{{--    change status--}}
    <script>
        $(document).ready(function () {
            $(document).on('click', '.statusBtn', function (e) {
                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });
                e.preventDefault();
                var btn = $(this);
                var id = $(this).data('id');
                var status = $(this).data('status');
                console.log(btn.text())
                var next = $(this).data('next');
                var current_status = "{{$order->status}}";
                console.log('status'+status +'c-status'+current_status)
                if (status != current_status) {
                    swal.fire({
                            title: "تأكيد عملية تغيير حالة الطلب!",
                            type: "warning",
                            cancelButtonColor: '#d33',
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: true,
                            cancelButtonText: 'إلغاء',
                            confirmButtonText: "تأكيد!",
                            showCancelButton: true
                    }).then(function (e) {
                        if (e.value === true) {
                            $.ajax({
                                type: "POST",
                                url: "{{route('order.status',$order->id)}}",
                                data: {status: status},
                                // beforeSend: function () {
                                //     $('.orderLoader').fadeIn(200);
                                // },
                                success: function (data) {
                                    if (data.status === 0) {
                                        swal.fire({
                                            type: 'error',
                                            icon: 'error',
                                            title: data.message,
                                            /*
                                                                                        timer: 4000
                                            */
                                        });
                                    } else {
                                        swal.fire({
                                            type: 'success',
                                            icon: 'success',
                                            title: @if(App::isLocale('en')) data.message_en @else data.message_ar @endif,
                                            /*timer: 5000*/
                                            confirmButtonClass: 'btn btn-success statusChanged',
                                            buttonsStyling: true,
                                            confirmButtonText: "تم"
                                        }).then(function (e) {
                                            $('.orderStatus li').each(function () {
                                                $(this).removeClass('active');
                                                $(this).find('a').removeClass('statusBtn');
                                                $(this).find('a').removeClass('notAllowStatus');
                                                $(this).find('a').addClass('notAllowStatus');
                                            });
                                            btn.parent().addClass('active');
                                            btn.parent().find('a').removeClass('notAllowStatus');
                                            btn.parent().find('a').removeClass('statusBtn');
                                            $('#btn_' + next).removeClass('notAllowStatus');
                                            $('#btn_' + next).addClass('statusBtn');

                                            $('#order_sts').parent().find('span').text(btn.text());
                                            $('#invoice_status').text(btn.text())
                                            // location.reload();

                                        });
                                    }
                                },
                                error: function (data) {
                                    console.log(data.responseText);
                                    swal.fire({
                                        type: 'warning',
                                        icon: 'warning',
                                        title: 'عذراً، حدثت خلل أثناء عملية تحديث الحالة',
                                        timer: 4000
                                    });
                                    $('.orderLoader').fadeOut(200);
                                },
                                complete: function () {
                                    //$('.orderLoader').fadeOut(200);
                                    //window.location = 'https://mapp.sa/admin/order/15737'
                                }
                            });
                        }
                    });
                } else {
                    e.dismiss;
                }

            });
            });
    </script>
@endsection

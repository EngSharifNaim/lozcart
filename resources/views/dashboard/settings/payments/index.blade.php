@extends('dashboard.layouts.app')
@section('style')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    <!-- END: Vendor CSS--><link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" href="https://mapp.sa/cPanel/css/cropper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />
    {{--        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}"  />--}}
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 17px;
        }
        .paymentsGates .card .subpay img {
            display: inline-block;
            margin: 0 5px;
            width: 70px;
            height: 50px;
        }
        .image_payment img{
            width: 300px;
            /*height: 300px;*/
        }
        .img_payment{
            width: 50px;
        }
        .head-label img{
            width: 140px;
        }
    </style>

    @if(App::isLocale('en'))
    @else

    @endif
    <style>
        /*.modal .modal-header {*/
        /*    background-color: #28c76f !important;*/
        /*}*/
        .modal-title{
            color: #ffffff;
        }
        .modal-slide-in .modal-dialog.sidebar-sm {
            width: 40rem !important;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Payments Methods')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Payments Methods')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="padding-top: 5px;padding-bottom: 5px;">
                                {{--                                <img class="img_payment" src="{{asset('photo/paypal.png')}}" alt="">--}}

                                <div class="head-label w-75 d-flex align-items-center">
                                    <img src="{{asset('photo/lozPayment.jpg')}}" alt="">
                                    <h4 class="ml-2 mr-2 mt-1" style="color: #000000 ;font-weight: bold">{{__('Accept all types of cards and wallets from all over the world.')}}
                                        <p style="font-size: 13px;color: #000000 " >{{__('Your store accepts payment with :')}}</p>
                                        <img style="width: 540px" src="{{asset('photo/cards1.png')}}" alt="">
                                    </h4>
                                </div>
                                @if (!$lozCart)
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <a data-toggle="modal" data-target="#addLozCart" id="Add_lozCart" class="dt-button create-new btn btn-success waves-effect waves-float waves-light" >
                                                <i data-feather="plus"></i>
                                                {{__('Add LozCart Payments')}}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">

                                @if ($lozCart)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>{{__('Payment method')}}</th>
                                                <th>{{__('Order Count')}}</th>
                                                <th>{{__('Payment movements')}}</th>
                                                <th>{{__('Account No')}}</th>
                                                <th>{{__('Routing number')}}</th>
                                                <th>{{__('Payment Gateway Fee')}}</th>
                                                <th>{{__('Status')}}</th>
                                                @if ($lozCart->status ==2)
                                                    <th>{{__('Actions')}}</th>
                                                @endif

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($lozCart)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <div class=" mr-1">
                                                                <img class="img_payment" style="    width: 135px;height: 40px;" src="{{asset('photo/lozPayment.jpg')}}" alt="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('payment.orders',$lozCart->id)}}">
                                                            {{__('Orders')}} ({{$lozCart->order_lozCart->count()}})
                                                        </a>

                                                    </td>
                                                    <td>

                                                        @if($lozCart->status !=2)
                                                            <a href="{{route('stripe.index')}}">
                                                                {{__('Show')}}
                                                            </a>
                                                        @else
                                                            {{__('Not Found')}}
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{str_pad( substr($lozCart->application->account_no, -4), strlen($lozCart->application->account_no), '*', App::isLocale('en')?STR_PAD_LEFT:STR_PAD_RIGHT)}}
                                                    </td>
                                                    <td>
                                                        {{$lozCart->application->account_no}}
                                                    </td>
                                                    <td>
                                                        {{$market->trader_plan->plan->lozPayment}}
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-switch custom-switch-success">
                                                            <input type="checkbox" class="custom-control-input" {{$lozCart->status ==2|| $lozCart->status ==3 ?'disabled':''}} onclick="changeStatusLozCart(event,{{$lozCart->id}})" value="{{$lozCart->status}}" id="status-{{$lozCart->id}}"
                                                                {{$lozCart->status==1?'checked':''}}>
                                                            <label class="custom-control-label" for="status-{{$lozCart->id}}">
                                                    <span class="switch-icon-left">
{{--                                                        <i data-feather="check"></i>--}}
                                                    </span>
                                                                {{--                                                        <span class="switch-icon-right">x</span>--}}
                                                            </label>
                                                        </div>
                                                    </td>
                                                    @if ($lozCart->status ==2)
                                                        <td>
                                                            <a href="javascript:;" data-toggle="modal" data-target="#editLozCart"  class="item-edit" >
                                                                <i data-feather="edit"></i>
                                                            </a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="padding-top: 5px;padding-bottom: 5px;">
                                <div class="head-label w-75 d-flex align-items-center">
                                    <img src="{{asset('photo/paypal.png')}}" alt="">
                                    <h4 class="ml-2 mr-2 mt-1 mt-1
" style="color: #000000 ;font-weight: bold">{{__('Express Payment (Paypal Express)')}}
                                        <p style="font-size: 13px;color: #000000 " >{{__('When you activate this payment method, your customers can pay you with PayPal')}}</p>
                                        {{--                                    <img style="width: 45%" src="{{asset('photo/paypal.png')}}" alt="">--}}
                                    </h4>
                                </div>
                                @if (!$paypal)
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <a data-toggle="modal" data-target="#addPayPal" class="dt-button create-new btn btn-success waves-effect waves-float waves-light" data-toggle="modal" data-target="#modals-slide-in" type="button">
                                                <i data-feather="plus"></i>
                                                {{__('Add PayPal')}}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">

                                @if ($paypal)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>{{__('Payment method')}}</th>
                                                <th>{{__('Order Count')}}</th>
                                                <th>{{__('Linked account')}}</th>
                                                <th>{{__('Application fee')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Actions')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($paypal)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <div class=" mr-1">
                                                                <img class="img_payment" style="    width: 135px;height: 70px;" src="{{asset('photo/paypal.png')}}" alt="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('payment.orders',$paypal->id)}}">
                                                            {{__('Orders')}} ({{$paypal->order_paypal->count()}})
                                                        </a>
                                                        {{--                                                {{App::isLocale('en')?$paypal->name}}--}}
                                                    </td>
                                                    <td>
                                                        {{$paypal->email}}
                                                    </td>
                                                    <td>
                                                        {{$market->trader_plan->plan->payPal_fee}}
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-switch custom-switch-success">
                                                            <input type="checkbox" class="custom-control-input" onclick="changeStatusPayPal(event,{{$paypal->id}})" value="{{$paypal->status}}" id="status-{{$paypal->id}}"
                                                                {{$paypal->status==1?'checked':''}}>
                                                            <label class="custom-control-label" for="status-{{$paypal->id}}">
                                                    <span class="switch-icon-left">
{{--                                                        <i data-feather="check"></i>--}}
                                                    </span>
                                                                {{--                                                        <span class="switch-icon-right">x</span>--}}
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:;" data-toggle="modal" data-target="#addPayPal" class="item-edit">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif


                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom p-1">

                                    <div class="head-label w-75 d-flex align-items-center">
                                        <img src="{{asset('photo/bankTransfer.jpg')}}" alt="">
                                        <h4 class="ml-2 mr-2 mt-1" style="color: #000000 ;font-weight: bold">{{__('Bank Transfer')}}
                                            <p style="font-size: 13px;color: #000000 " >{{__("Your bank account details will appear on the customer's payment page and he will have the option to raise the transfer receipt for you.")}}</p>
                                            {{--                                    <img style="width: 45%" src="{{asset('photo/paypal.png')}}" alt="">--}}
                                        </h4>
                                    </div>
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <button class="dt-button create-new btn btn-success" data-toggle="modal" data-target="#modals-slide-in"   type="button" >
                                                <i data-feather="plus"></i>
                                                {{__('Add New Bank Account')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="datatables-basic table" >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>#</th>
                                        {{--                                        <th>{{__('Country')}}</th>--}}
                                        <th>{{__('Bank')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Account No')}}</th>
                                        <th>{{__('IBAN')}}</th>
{{--                                        <th>{{__('Number Transfers')}}</th>--}}
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom p-1">

                                    <div class="head-label w-75 d-flex align-items-center">
                                        <img src="{{asset('photo/other.png')}}" alt="">
                                        <h4 class="ml-2 mr-2 mt-1" style="color: #000000 ;font-weight: bold">{{__('Other payment methods')}}
                                            <p style="font-size: 13px;color: #000000 " >
                                                {{__("You can add your account information in wallets and electronic banks such as your account in Pioneer Bank, your wallet address in virtual currency (Bitcoin etc..) and it will have the option to raise the transfer receipt for you.")}}</p>
                                            {{--                                    <img style="width: 45%" src="{{asset('photo/paypal.png')}}" alt="">--}}
                                        </h4>
                                    </div>
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <button class="dt-button create-new btn btn-success" data-toggle="modal" data-target="#modals-slide-in2"   type="button" >
                                                <i data-feather="plus"></i>
                                                {{__('Add New Payment Method')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="datatables-basic2 table" >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>#</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Order Count')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form class="add-new-record modal-content pt-0" id="add_bank_account" method="POST" enctype="multipart/form-data">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('New Bank Account')}}</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="country" class="control-label">
                                                    {{__('Country')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <select class="select2 w-100" name="country_id" id="country_id_modal">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="all_cities_dev" style="display: block">
                                            <div class="form-group">
                                                <label for="country" class="control-label">
                                                    {{__('Bank')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <select class="select2 w-100" name="bank_id"  id="bank_id">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title_ar" class="control-label">
                                                    {{__('Account Holder Name Ar')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <input required="" value="" id="name_ar" type="text" name="name_ar" class="form-control" placeholder="{{__('Account Holder Name Ar')}}" aria-required="true">
                                            </div>
                                        </div>
                                        @if(in_array('en',$language))
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">{{__('Account Holder Name En')}}
                                                        <span style="color: red"> * </span>
                                                    </label>
                                                    <input required="" value="" id="name" type="text" name="name" class="form-control" placeholder="{{__(' Account Holder Name En')}}" aria-required="true">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title_ar" class="control-label">
                                                    {{__('Account No')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <input required="" value="" id="account_no" type="number" name="account_no" onkeypress="isInputNumber(event,this.value)" class="form-control" placeholder="{{__('Account No')}}" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="details_ar" class="control-label">
                                                    {{__('Account Details')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <textarea required="" id="details_ar" type="text" name="details_ar" class="form-control" placeholder="{{__('Account details in Arabic example: branch name')}}" aria-required="true"></textarea>
                                            </div>
                                        </div>
                                        @if(in_array('en',$language))
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="details" class="control-label">
                                                        {{__('Account Details En')}}
                                                        <span style="color: red"> * </span>
                                                    </label>

                                                    <textarea required="" id="details" type="text" name="details" class="form-control" placeholder=" {{__('Account details in English example: branch name')}}" aria-required="true"></textarea>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="basic-addon2" class="control-label">
                                                    {{__('IBAN')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon2"></span>
                                                    </div>
                                                    <input required="" value="" id="IBAN" type="text" name="iban" class="form-control IBAN" placeholder="{{__('IBAN')}}"  aria-describedby="basic-addon2"  aria-required="true">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="addBankAccount"  type="button" class=" btn btn-success waves-effect waves-light">
                                        {{__('Save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal modal-slide-in fade" id="modals-slide-in2">
                        <div class="modal-dialog sidebar-sm">
                            <form class="add-new-record modal-content pt-0" id="add_payment" method="POST" enctype="multipart/form-data">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('New Payment Method')}}</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name_ar" class="control-label">
                                                    {{__('The name of the payment method in Arabic')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <input required="" value="" id="name_ar" type="text" name="name_ar" class="form-control" placeholder="{{__('Example: Bitcoin')}}" aria-required="true">
                                            </div>
                                        </div>
                                        @if(in_array('en',$language))
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">{{__('The name of the payment method in English')}}
                                                        <span style="color: red"> * </span>
                                                    </label>
                                                    <input required="" value="" id="name" type="text" name="name" class="form-control" placeholder="Example: Bitcoin" aria-required="true">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="details_ar" class="control-label">
                                                    {{__('Payment method details in Arabic')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <textarea required="" id="details_ar" type="text" name="details_ar" class="form-control" placeholder="{{__('Please send the total order amount to the following Bitcoin wallet: (add your wallet address) and upload a picture of the successful transfer.')}}" aria-required="true"></textarea>
                                            </div>
                                        </div>
                                        @if(in_array('en',$language))
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="details" class="control-label">
                                                        {{__('Payment method details in English')}}
                                                        <span style="color: red"> * </span>
                                                    </label>

                                                    <textarea required="" id="details" type="text" name="details" class="form-control" placeholder=" {{__('Please send the total order amount to the following Bitcoin wallet: (add your wallet address) and upload a picture of the successful transfer.')}}" aria-required="true"></textarea>
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="addPayment"  type="button" class=" btn btn-success waves-effect waves-light">
                                        {{__('Save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div id="addPayPal" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> {{$paypal ? __('Edit PayPal Account'): __('Add PayPal Account')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form  method="POST" enctype="multipart/form-data" id="add_paypal" novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="control-label">
                                        {{__('Email Account PayPal')}}
                                        <span style="color: red">* </span>
                                    </label>
                                    <input required="" value="{{$paypal->email ??''}}" id="email" type="email" name="email" class="form-control" placeholder="{{__('Email Account PayPal')}}" aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="client_id" class="control-label">
                                        {{__('Client ID')}}
                                        <span style="color: red">* </span>
                                    </label>
                                    <input required="" value="{{$paypal->client_id ??''}}" id="client_id" type="text" name="client_id" class="form-control" placeholder="{{__('AWFNTL5NMW4enLHVPp3YHjy69iiRfHz_m5fOxP37QoTD7DJCza77I2RtxtEmCfJvFJ7AWmXdVdNvSoIA')}}" aria-required="true">
                                </div>
                                <div class="form-group">
                                    <label for="secret_id" class="control-label">
                                        {{__('Secret ID')}}
                                        <span style="color: red">* </span>
                                    </label>
                                    <input required="" value="{{$paypal->secret_id ??''}}" id="secret_id" type="text" name="secret_id" class="form-control" placeholder="{{__('REiAHRo9hRa40BfrWpQFoYQOUYqriEnkoi0bX9I2aa6b2bf7NRxGBc03YvFh_11y69PcyEKv2vmZ3tMy')}}" aria-required="true">
                                </div>
                                <p>{{__('Read this page to find out how to activate accepting payments with ')}}
                                    <a href="https://www.lozcart.com/paypal" target="_blank">{{__('PayPal')}}<i class="fas fa-external-link-alt"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="add_PayPal" class="btn btn-success waves-effect waves-light">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (!$lozCart)
        <div id="addLozCart" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Add LozCart Payments')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form  method="POST" enctype="multipart/form-data" id="add_lozcart" novalidate="novalidate">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center ">
                                        <div>
                                            <i class="fas fa-credit-card ml-2 mr-2 h1"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-weight-bolder">{{__('With LozCart Payments your store accepts credit cards')}}</h3>
                                            <h5>{{__('Before your sales can be deposited into your bank account, you need to provide some additional information')}}</h5>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="business_type" >{{__('Business Type')}}</label>
                                                    <select class="form-control" name="business_type" id="business_type">
                                                        <option  value="1" selected>{{__('Individual/sole proprietor/single-member ')}}</option>
                                                        <option  value="2">{{__('Corporation')}}</option>
                                                        <option  value="3">{{__('LLC')}}</option>
                                                        <option  value="4">{{__('Partnership')}}</option>
                                                        <option  value="5">{{__('Nonprofit')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Business Details')}}</h3>
                                            <div class="form-group" id="div_business_registration_no" style="display: none;">
                                                <label for="business_registration_no" class="control-label">
                                                    {{__('Business registration number')}}
                                                    {{--                                                <span style="color: red">* </span>--}}
                                                </label>
                                                <input required=""
                                                       id="business_registration_no" type="number" disabled="disabled" name="business_registration_no"
                                                       class="form-control" placeholder="{{__('Business registration number')}}"
                                                       onkeypress="isInputNumber(event,this.value)"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="street_address" class="control-label">
                                                    {{__('Street address')}}
                                                    {{--                                                <span style="color: red">* </span>--}}
                                                </label>
                                                <input required=""
                                                       id="street_address" type="text" name="street_address"
                                                       autocomplete="new-street_address" class="form-control" placeholder="{{__('Street address')}}"/>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="city" class="control-label">
                                                        {{__('City')}}
                                                        {{--                                                <span style="color: red">* </span>--}}
                                                    </label>
                                                    <input required=""
                                                           id="city" type="text" name="city" autocomplete="new-city"
                                                           class="form-control" placeholder="{{__('City')}}"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="postal_code" class="control-label">
                                                        {{__('Postal code')}}
                                                        {{--                                                <span style="color: red">* </span>--}}
                                                    </label>
                                                    <input required=""
                                                           id="postal_code" type="number" name="postal_code" autocomplete="new-postal_code"
                                                           class="form-control" placeholder="{{__('Postal code')}}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicSelect" >{{__('Country')}}</label>
                                                <select class="form-control" name="country" id="basicSelect">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">
                                                            @if(App::isLocale('en')) {{$country->name}} @else {{$country->name_ar}} @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Personal Details')}}</h3>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="f_name" class="control-label">
                                                        {{__('First Name')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required=""
                                                           id="f_name" type="text" name="f_name" autocomplete="new-f_name"
                                                           class="form-control" placeholder="{{__('First Name')}}"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nickname" class="control-label">
                                                        {{__('Last Name')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required=""
                                                           id="nickname" type="text" name="nickname" autocomplete="new-nickname"
                                                           class="form-control" placeholder="{{__('Last Name')}}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pd-months-year">{{__('Date of Birth')}}
                                                    <span style="color: red">*</span>
                                                </label>
                                                <input type="text" name="dob" placeholder="{{__('Date of Birth')}}" id="datepicker" class="form-control" value="2020-03-13" >
                                                {{--                                            <input type="text" name="dob"  id="pd-months-year" class="form-control pickadate-months-year" placeholder="{{__('Date of Birth')}}" />--}}

                                                {{--                                            <input type="text" name="dob" id="fp-default" class="form-control flatpickr-basic" placeholder="{{__('Date of Birth')}}" />--}}
                                            </div>
                                            <div class="form-group">
                                                <label for="national_number" class="control-label">
                                                    {{__('The national number as it appears in the passport')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <input required=""
                                                       id="national_number" type="number" name="national_number"autocomplete="new-national_number"
                                                       class="form-control" placeholder="{{__('The national number as it appears in the passport')}}"
                                                       onkeypress="isInputNumber(event,this.value)"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Product Details')}}</h3>
                                            <div class="form-group ">
                                                <label for="basicSelect" >{{__('Product Type')}}</label>
                                                <select class="form-control" required name="product_type" id="basicSelect">
                                                    <option  disabled selected>{{__('Select Product Type')}}</option>
                                                    <option  value="1">{{__('Software')}}</option>
                                                    <option  value="2">{{__('Building services')}}</option>
                                                    <option  value="3">{{__('Professional services')}}</option>
                                                    <option  value="4">{{__('Membership organizations')}}</option>
                                                    <option  value="5">{{__('Transportation')}}</option>
                                                    <option  value="6">{{__('Medical services')}}</option>
                                                    <option  value="7">{{__('Entertainment and recreation')}}</option>
                                                    <option  value="8">{{__('Retail')}}</option>
                                                    <option  value="9">{{__('Digital products')}}</option>
                                                    <option  value="10">{{__('Financial services')}}</option>
                                                    <option  value="11">{{__('Food and drink')}}</option>
                                                    <option  value="12">{{__('Education')}}</option>
                                                    <option  value="13">{{__('Clothing and accessories')}}</option>
                                                    <option  value="14">{{__('Regulated and age-restricted products')}}</option>
                                                    <option  value="15">{{__('Travel and lodging')}}</option>
                                                    <option  value="16">{{__('Consulting services')}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="fp-default">{{__('Description of the product or services')}}
                                                    <span style="color: red">*</span>
                                                </label>
                                                <textarea required="" class="form-control" name="description_product" id="exampleFormControlTextarea1" rows="3" placeholder="{{__('Description of the product or services')}}"></textarea>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Customer billing statement')}}</h3>
                                            <p>{{__('Edit how your store name and phone number appear on your customers bank statements')}}</p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="business_name" class="control-label">
                                                        {{__('The name of your business')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required=""
                                                           id="business_name" type="text" name="business_name"autocomplete="new-business_name"
                                                           class="form-control" placeholder="{{__('The name of your business')}}"/>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="mobile" class="control-label">
                                                        {{__('Mobile')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required="" value="" id="mobile" autocomplete="new-mobile" type="number" name="mobile" class="form-control" placeholder="{{__('Mobile')}}" aria-required="true">
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <label for="basicSelect" >{{__('Country')}}</label>
                                                    <select class="select2 form-control" name="country_id" id="country_id">
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Banking Information')}}</h3>
                                            <p>{{__('Your money will be deposited into this account, obtain the correct account information from')}}

                                                <a href="https://login.payoneer.com" target="_blank">Payoneer<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="routing_no" class="control-label">
                                                        {{__('Routing number')}} (ABA)
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required=""
                                                           id="routing_no" type="number" name="routing_no" autocomplete="new-routing_no"
                                                           class="form-control" placeholder="{{__('Routing number')}} (ABA)"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="routing_no" class="control-label">
                                                        {{__('Account number')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required=""
                                                           id="account_no" type="number" name="account_no" autocomplete="new-account_no"
                                                           class="form-control" placeholder="{{__('Account number')}}"/>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    @if (App::isLocale('en'))
                                                        <img class="w-100" src="{{asset('photo/15.png')}}" alt="">
                                                    @else
                                                        <img class="w-100" src="{{asset('photo/16.png')}}" alt="">
                                                    @endif

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>{{__('You can find these numbers on the Payoneer Global Payment Service page or by contacting Payoneer Customer Service')}}</p>
                                                    <p>{{__('Do not have an account yet?')}}
                                                        <a href="http://share.payoneer.com/nav/3XurAmwtKLVFyhBrtIdhCEOYcHhdFE09bpvxU5olryix7XdEiNbtqqqhFnXEHRl3Vu3gacuG5YlhlisWgjkWuw2" target="_blank">{{__('Register for free and get 25$')}}<i class="fas fa-external-link-alt"></i></a>
                                                    </p>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Upload documents')}}</h3>
                                            <div class="demo-spacing-0">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="alert-body d-flex justify-content-center ">
                                                        <div>
                                                            <span class="fas fa-exclamation-circle ml-2 mr-2 h1 " style="color: unset"></span>
                                                        </div>
                                                        <div>
                                                            <h3 class="font-weight-bolder"> {{__('Send documents to verify your account information')}}</h3>
                                                            <h5> {{__('The documents you send must match the account information, please upload your passport to verify your identity and a valid address proof document')}}</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="demo-spacing-0 mt-2 mb-2">
                                                <div class="alert alert-danger" role="alert">
                                                    <div class="alert-body d-flex justify-content-center ">
                                                        <div>
                                                            <span class="fas fa-ban ml-2 mr-2 h1 " style="color: unset"></span>
                                                        </div>
                                                        <div>
                                                            <h5> {{__('Please ensure that you provide your full legal name and correct data, upload a passport and a valid official document in English for proof of address matching your name and address.')}}</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <h3>{{__('Identity Verification')}}</h3>
                                            <div class="form-group ">
                                                <label for="identity_type" class="control-label">
                                                    {{__('Upload a clear copy of the proof of identity document in English issued by an official body')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <select class="form-control" name="identity_type" id="identity_type">
                                                    <option  value="1">{{__('Passport ( Recommended )')}}</option>
                                                    <option  value="2">{{__('Identity')}}</option>
                                                    <option  value="3">{{__('driving license')}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="identity_photo_f">{{__('The document from the front')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <div class="custom-file">
                                                    <input required="" type="file" name="identity_photo_f" class="custom-file-input" id="identity_photo_f">
                                                    <label class="custom-file-label" for="identity_photo_f">{{__('Choose file')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group" id="div_identity_photo_b"  style="display: none;">
                                                <label for="identity_photo_b">{{__('The document from the back')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <div class="custom-file">
                                                    <input required="" type="file" name="identity_photo_b" class="custom-file-input" id="identity_photo_b">
                                                    <label class="custom-file-label" for="identity_photo_b">{{__('Choose file')}}</label>
                                                </div>
                                            </div>
                                            <h3>{{__('Address Verification')}}</h3>
                                            <div class="form-group ">
                                                <label for="address_verification_type" class="control-label">
                                                    {{__('Upload a clear copy of an address proof document in English issued by an official body')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <select class="form-control" name="address_verification_type" id="address_verification_type">
                                                    <option  value="1">{{__('Bank statement (in English) - (dated within 6 months)')}}</option>
                                                    <option  value="2">{{__('Government-issued document - (in English)')}}</option>
                                                    <option  value="3">{{__('Utility bill (in English) - (dated within 6 months)')}}</option>
                                                    <option  value="3">{{__('Birth certificate (in English)')}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address_verification_photo_f">{{__('The document from the front')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <div class="custom-file">
                                                    <input required="" type="file" name="address_verification_photo_f" class="custom-file-input" id="address_verification_photo_f">
                                                    <label class="custom-file-label" for="address_verification_photo_f">{{__('Choose file')}}</label>
                                                </div>
                                            </div>
                                            <h3>{{__('Terms And Conditions')}}</h3>
                                            <p>{{__('By using LozCart Payments, you agree to our')}}
                                                <a href="#" target="_blank"> {{__('Terms of Service')}}<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                            <p>{{__('Please review carefully the terms and types of acceptable documents before activating LozCart Payments')}}
                                                <a href="#" target="_blank"> {{__('Acceptable Documents')}}<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                            <p>{{__('Before activating LozCart please review the restricted business carefully, your account will not be activated if it is one of the')}}
                                                <a href="#" target="_blank"> {{__('Restricted business')}}<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" id="add_LozCart" class="btn btn-success waves-effect waves-light">{{__('Activation LozCart Payments')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    @if ($lozCart)
        <div id="editLozCart" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-modal="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{__('Edit LozCart Payments')}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form  method="POST" enctype="multipart/form-data" id="edit_lozcart" novalidate="novalidate">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-center ">
                                        <div>
                                            <i class="fas fa-credit-card ml-2 mr-2 h1"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-weight-bolder">{{__('With LozCart Payments your store accepts credit cards')}}</h3>
                                            <h5>{{__('Before your sales can be deposited into your bank account, you need to provide some additional information')}}</h5>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="business_type" >{{__('Business Type')}}</label>
                                                    <select class="form-control" required name="business_type" id="business_type">
                                                        <option  disabled selected>{{__('Select Product Type')}}</option>
                                                        <option  value="1" {{$lozCart->application->business_type=='1'?'selected':''}}>{{__('Individual/sole proprietor/single-member ')}}</option>
                                                        <option  value="2"  {{$lozCart->application->business_type=='2'?'selected':''}}>{{__('Corporation')}}</option>
                                                        <option  value="3" {{$lozCart->application->business_type=='3'?'selected':''}}>{{__('LLC')}}</option>
                                                        <option  value="4" {{$lozCart->application->business_type=='4'?'selected':''}}>{{__('Partnership')}}</option>
                                                        <option  value="5" {{$lozCart->application->business_type=='5'?'selected':''}}>{{__('Nonprofit')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Business Details')}}</h3>
                                            <div class="form-group" id="div_business_registration_no" style="display: none;">
                                                <label for="business_registration_no" class="control-label">
                                                    {{__('Business registration number')}}
                                                    {{--                                                <span style="color: red">* </span>--}}
                                                </label>
                                                <input required=""
                                                       id="business_registration_no" type="number" disabled="disabled" name="business_registration_no"
                                                       class="form-control" placeholder="{{__('Business registration number')}}"
                                                       value="{{$lozCart->application->business_registration_no}}" onkeypress="isInputNumber(event,this.value)"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="control-label">
                                                    {{__('Street address')}}
                                                    {{--                                                <span style="color: red">* </span>--}}
                                                </label>
                                                <input required=""
                                                       id="street_address" type="text" name="street_address" value="{{$lozCart->application->street_address}}"
                                                       autocomplete="new-street_address" class="form-control" placeholder="{{__('Street address')}}"/>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="control-label">
                                                        {{__('City')}}
                                                        {{--                                                <span style="color: red">* </span>--}}
                                                    </label>
                                                    <input required="" value="{{$lozCart->application->street_address}}"
                                                           id="city" type="text" name="city" autocomplete="new-city"
                                                           class="form-control" placeholder="{{__('City')}}"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="postal_code" class="control-label">
                                                        {{__('Postal code')}}
                                                        {{--                                                <span style="color: red">* </span>--}}
                                                    </label>
                                                    <input required=""
                                                           id="postal_code" type="number" name="postal_code" autocomplete="new-postal_code"
                                                           class="form-control" placeholder="{{__('Postal code')}}" value="{{$lozCart->application->postal_code}}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="basicSelect" >{{__('Country')}}</label>
                                                <select class="form-control" name="country" id="basicSelect">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}" {{$lozCart->application->country==$country->id?'selected':''}}>
                                                            @if(App::isLocale('en')) {{$country->name}} @else {{$country->name_ar}} @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Personal Details')}}</h3>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="f_name" class="control-label">
                                                        {{__('First Name')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required="" value="{{$lozCart->application->f_name}}"
                                                           id="f_name" type="text" name="f_name" autocomplete="new-f_name"
                                                           class="form-control" placeholder="{{__('First Name')}}"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nickname" class="control-label">
                                                        {{__('Last Name')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required="" value="{{$lozCart->application->nickname}}"
                                                           id="nickname" type="text" name="nickname" autocomplete="new-nickname"
                                                           class="form-control" placeholder="{{__('Last Name')}}"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="pd-months-year">{{__('Date of Birth')}}
                                                    <span style="color: red">*</span>
                                                </label>
                                                <input type="text" name="dob" placeholder="{{__('Date of Birth')}}" id="datepicker" class="form-control" value="{{ $lozCart->application->dob }}" >
                                                {{--                                            <input type="text" name="dob"  id="pd-months-year" class="form-control pickadate-months-year" placeholder="{{__('Date of Birth')}}" />--}}

                                                {{--                                            <input type="text" name="dob" id="fp-default" class="form-control flatpickr-basic" placeholder="{{__('Date of Birth')}}" />--}}
                                            </div>
                                            <div class="form-group">
                                                <label for="national_number" class="control-label">
                                                    {{__('The national number as it appears in the passport')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <input required="" value="{{$lozCart->application->national_number}}"
                                                       id="national_number" type="number" name="national_number"autocomplete="new-national_number"
                                                       class="form-control" placeholder="{{__('The national number as it appears in the passport')}}"
                                                       onkeypress="isInputNumber(event,this.value)"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Product Details')}}</h3>
                                            <div class="form-group ">
                                                <label for="basicSelect" >{{__('Product Type')}}</label>
                                                <select class="form-control" name="product_type" id="basicSelect">
                                                    <option  value="1" {{$lozCart->application->product_type=='1'?'selected':''}}>{{__('Software')}}</option>
                                                    <option  value="2" {{$lozCart->application->product_type=='2'?'selected':''}}>{{__('Building services')}}</option>
                                                    <option  value="3" {{$lozCart->application->product_type=='3'?'selected':''}}>{{__('Professional services')}}</option>
                                                    <option  value="4" {{$lozCart->application->product_type=='4'?'selected':''}}>{{__('Membership organizations')}}</option>
                                                    <option  value="5" {{$lozCart->application->product_type=='5'?'selected':''}}>{{__('Transportation')}}</option>
                                                    <option  value="6" {{$lozCart->application->product_type=='6'?'selected':''}}>{{__('Medical services')}}</option>
                                                    <option  value="7" {{$lozCart->application->product_type=='7'?'selected':''}}>{{__('Entertainment and recreation')}}</option>
                                                    <option  value="8" {{$lozCart->application->product_type=='8'?'selected':''}}>{{__('Retail')}}</option>
                                                    <option  value="9" {{$lozCart->application->product_type=='9'?'selected':''}}>{{__('Digital products')}}</option>
                                                    <option  value="10" {{$lozCart->application->product_type=='10'?'selected':''}}>{{__('Financial services')}}</option>
                                                    <option  value="11" {{$lozCart->application->product_type=='11'?'selected':''}}>{{__('Food and drink')}}</option>
                                                    <option  value="12" {{$lozCart->application->product_type=='12'?'selected':''}}>{{__('Education')}}</option>
                                                    <option  value="13" {{$lozCart->application->product_type=='13'?'selected':''}}>{{__('Clothing and accessories')}}</option>
                                                    <option  value="14" {{$lozCart->application->product_type=='14'?'selected':''}}>{{__('Regulated and age-restricted products')}}</option>
                                                    <option  value="15" {{$lozCart->application->product_type=='15'?'selected':''}}>{{__('Travel and lodging')}}</option>
                                                    <option  value="16" {{$lozCart->application->product_type=='16'?'selected':''}}>{{__('Consulting services')}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="fp-default">{{__('Description of the product or services')}}
                                                    <span style="color: red">*</span>
                                                </label>
                                                <textarea required="" class="form-control" name="description_product" id="exampleFormControlTextarea1" rows="3" placeholder="{{__('Description of the product or services')}}">{{$lozCart->application->description_product}}</textarea>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Customer billing statement')}}</h3>
                                            <p>{{__('Edit how your store name and phone number appear on your customers bank statements')}}</p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="business_name" class="control-label">
                                                        {{__('The name of your business')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required="" value="{{$lozCart->application->business_name}}"
                                                           id="business_name" type="text" name="business_name"autocomplete="new-business_name"
                                                           class="form-control" placeholder="{{__('The name of your business')}}"/>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="mobile" class="control-label">
                                                        {{__('Mobile')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required="" value="{{$lozCart->application->mobile}}" id="mobile" autocomplete="new-mobile" type="number" name="mobile" class="form-control" placeholder="{{__('Mobile')}}" aria-required="true">
                                                </div>
                                                <div class="form-group col-md-3 ">
                                                    <label for="basicSelect" >{{__('Country')}}</label>
                                                    <select class="select2 form-control" name="country_id" id="country_id">
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Banking Information')}}</h3>
                                            <p>{{__('Your money will be deposited into this account, obtain the correct account information from')}}

                                                <a href="https://login.payoneer.com" target="_blank">Payoneer<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="routing_no" class="control-label">
                                                        {{__('Routing number')}} (ABA)
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required="" value="{{$lozCart->application->routing_no}}"
                                                           id="routing_no" type="number" name="routing_no" autocomplete="new-routing_no"
                                                           class="form-control" placeholder="{{__('Routing number')}} (ABA)"/>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="routing_no" class="control-label">
                                                        {{__('Account number')}}
                                                        <span style="color: red">* </span>
                                                    </label>
                                                    <input required="" value="{{$lozCart->application->account_no}}"
                                                           id="account_no" type="number" name="account_no" autocomplete="new-account_no"
                                                           class="form-control" placeholder="{{__('Account number')}}"/>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    @if (App::isLocale('en'))
                                                        <img class="w-100" src="{{asset('photo/15.png')}}" alt="">
                                                    @else
                                                        <img class="w-100" src="{{asset('photo/16.png')}}" alt="">
                                                    @endif

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <p>{{__('You can find these numbers on the Payoneer Global Payment Service page or by contacting Payoneer Customer Service')}}</p>
                                                    <p>{{__('Do not have an account yet?')}}
                                                        <a href="http://share.payoneer.com/nav/3XurAmwtKLVFyhBrtIdhCEOYcHhdFE09bpvxU5olryix7XdEiNbtqqqhFnXEHRl3Vu3gacuG5YlhlisWgjkWuw2" target="_blank">{{__('Register for free and get 25$')}}<i class="fas fa-external-link-alt"></i></a>
                                                    </p>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>{{__('Upload documents')}}</h3>
                                            <div class="demo-spacing-0">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="alert-body d-flex justify-content-center ">
                                                        <div>
                                                            <span class="fas fa-exclamation-circle ml-2 mr-2 h1 " style="color: unset"></span>
                                                        </div>
                                                        <div>
                                                            <h3 class="font-weight-bolder"> {{__('Send documents to verify your account information')}}</h3>
                                                            <h5> {{__('The documents you send must match the account information, please upload your passport to verify your identity and a valid address proof document')}}</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="demo-spacing-0 mt-2 mb-2">
                                                <div class="alert alert-danger" role="alert">
                                                    <div class="alert-body d-flex justify-content-center ">
                                                        <div>
                                                            <span class="fas fa-ban ml-2 mr-2 h1 " style="color: unset"></span>
                                                        </div>
                                                        <div>
                                                            <h5> {{__('Please ensure that you provide your full legal name and correct data, upload a passport and a valid official document in English for proof of address matching your name and address.')}}</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <h3>{{__('Identity Verification')}}</h3>
                                            <div class="form-group ">
                                                <label for="identity_type" class="control-label">
                                                    {{__('Upload a clear copy of the proof of identity document in English issued by an official body')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <select class="form-control" name="identity_type" id="identity_type">
                                                    <option  value="1" {{$lozCart->application->identity_type==1?'selected':''}}>{{__('Passport ( Recommended )')}}</option>
                                                    <option  value="2" {{$lozCart->application->identity_type==2?'selected':''}}>{{__('Identity')}}</option>
                                                    <option  value="3" {{$lozCart->application->identity_type==3?'selected':''}}>{{__('driving license')}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="identity_photo_f">{{__('The document from the front')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <div class="custom-file">
                                                    <input  type="file" name="identity_photo_f" class="custom-file-input" id="identity_photo_f">
                                                    <label class="custom-file-label" for="identity_photo_f">{{__('Choose file')}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group" id="div_identity_photo_b" @if($lozCart->application->identity_type==1)style="display: none;" @endif >
                                                <label for="identity_photo_b">{{__('The document from the back')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <div class="custom-file">
                                                    <input  type="file" name="identity_photo_b" class="custom-file-input" id="identity_photo_b">
                                                    <label class="custom-file-label" for="identity_photo_b">{{__('Choose file')}}</label>
                                                </div>
                                            </div>
                                            <h3>{{__('Address Verification')}}</h3>
                                            <div class="form-group ">
                                                <label for="address_verification_type" class="control-label">
                                                    {{__('Upload a clear copy of an address proof document in English issued by an official body')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <select class="form-control" name="address_verification_type" id="address_verification_type">
                                                    <option  value="1" {{$lozCart->application->address_verification_type==1?'selected':''}}>{{__('Bank statement (in English) - (dated within 6 months)')}}</option>
                                                    <option  value="2" {{$lozCart->application->address_verification_type==2?'selected':''}}>{{__('Government-issued document - (in English)')}}</option>
                                                    <option  value="3" {{$lozCart->application->address_verification_type==3?'selected':''}}>{{__('Utility bill (in English) - (dated within 6 months)')}}</option>
                                                    <option  value="4" {{$lozCart->application->address_verification_type==1?'selected':''}}>{{__('Birth certificate (in English)')}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="address_verification_photo_f">{{__('The document from the front')}}
                                                    <span style="color: red">* </span>
                                                </label>
                                                <div class="custom-file">
                                                    <input  type="file" name="address_verification_photo_f" class="custom-file-input" id="address_verification_photo_f">
                                                    <label class="custom-file-label" for="address_verification_photo_f">{{__('Choose file')}}</label>
                                                </div>
                                            </div>
                                            <h3>{{__('Terms And Conditions')}}</h3>
                                            <p>{{__('By using LozCart Payments, you agree to our')}}
                                                <a href="#" target="_blank">{{__('Terms of Service')}}<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                            <p>{{__('Please review carefully the terms and types of acceptable documents before activating LozCart Payments')}}
                                                <a href="#" target="_blank">{{__('Acceptable Documents')}}<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                            <p>{{__('Before activating LozCart please review the restricted business carefully, your account will not be activated if it is one of the')}}
                                                <a href="#" target="_blank">{{__('Restricted business')}}<i class="fas fa-external-link-alt"></i></a>
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="button" id="edit_LozCart" class="btn btn-success waves-effect waves-light">{{__('Activation LozCart Payments')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif
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
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <script>
        $(function () {
            'use strict';

            var dt_basic_table = $('.datatables-basic'),
                assetPath = '{{asset('app-assets/')}}';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }

            // DataTable with buttons
            // --------------------------------------------------------------------

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('payment.get_bank_accounts')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        // { data: 'country' },
                        { data: 'bank' },
                        { data: 'name' },
                        { data: 'account_no' },
                        { data: 'iban' },
                        // { data: 'number_transfers' },
                        { data: '' },
                        { data: '' },
                    ],
                    columnDefs: [
                        {
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            responsivePriority: 2,
                            targets: 0
                        },
                        {
                            // For Checkboxes
                            targets: 1,
                            orderable: false,
                            responsivePriority: 3,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input dt-checkboxes sub_chk" name="" type="checkbox" value="'+full.id+'" id="checkbox' +
                                    data +
                                    '" /><label class="custom-control-label" for="checkbox' +
                                    data +
                                    '"></label></div>'
                                );
                            },
                            checkboxes: {
                                selectAllRender:
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>'
                            }
                        },
                        {
                            targets: 2,
                            visible: false
                        },

                            {{--{--}}
                            {{--    // Avatar image/badge, Name and post--}}
                            {{--    targets: 3,--}}
                            {{--    render: function (data, type, full, meta) {--}}
                            {{--        var $country = full['country'];--}}
                            {{--        console.log('co'+$country)--}}


                            {{--        // $name = full['market_name'];--}}
                            {{--        if ($country )   {--}}
                            {{--            // For Avatar image--}}
                            {{--            var $output1=''--}}
                            {{--            // $.each($countries, function (i, option) {--}}
                            {{--                // var $country=option.name_ar--}}
                            {{--                // console.log($category)--}}
                            {{--                $output1  +=--}}
                            {{--                --}}{{--    '<span >' +--}}
                            {{--                --}}{{--    @if(App::isLocale('en')) $country.name @else $country.name_ar @endif +--}}
                            {{--                --}}{{--'</span>';--}}
                            {{--            '<div class="d-flex justify-content-left align-items-center">'+--}}
                            {{--                '<div class="avatar  mr-1">'+--}}
                            {{--                    '<img src="{{asset('uploads/countries/').'/'}}'+$country.flag+'" alt="Avatar" width="32" height="32">'+--}}
                            {{--                    // <span class="avatar-content">O</span>--}}
                            {{--                '</div>'+--}}
                            {{--                '<div class="d-flex flex-column">'+--}}
                            {{--                    '<span class="emp_name text-truncate font-weight-bold">'+--}}
                            {{--                    @if(App::isLocale('en')) $country.name @else $country.name_ar @endif+--}}
                            {{--                '</span>'+--}}
                            {{--                '</div>'+--}}
                            {{--            '</div>';--}}
                            {{--                // $output1  += ',';--}}
                            {{--            // });--}}
                            {{--            // console.log($output1);--}}
                            {{--        }--}}

                            {{--        if ($country == null){--}}
                            {{--            $output1  = '<span > {{__("All Countries")}}</span>'--}}
                            {{--        }--}}

                            {{--        // var colorClasss = $country === '' ? ' bg-light-' + $state + ' ' : '';--}}
                            {{--        var $row_output =''+--}}
                            {{--            $output1 ;--}}
                            {{--        return $row_output;--}}
                            {{--    }--}}
                            {{--},--}}
                        {
                            // Avatar image/badge, Name and post
                            targets: 3,
                            orderable: false,
                            render: function (data, type, full, meta) {
                                var $bank = full['bank'];
                                console.log('co'+$bank)


                                // $name = full['market_name'];
                                if ($bank )   {
                                    // For Avatar image
                                    var $output1=''
                                    // $.each($countries, function (i, option) {
                                    // var $country=option.name_ar
                                    // console.log($category)
                                    $output1  +=
                                        {{--    '<span >' +--}}
                                            {{--    @if(App::isLocale('en')) $country.name @else $country.name_ar @endif +--}}
                                            {{--'</span>';--}}
                                        //     '<div class="d-flex justify-content-left align-items-center">'+
                                        // '<div class="avatar  mr-1">'+
                                        // '<img src="'+$bank.logo+'" alt="Avatar" width="32" height="32">'+
                                        // // <span class="avatar-content">O</span>
                                        // '</div>'+
                                        '<div class="d-flex flex-column">'+
                                        '<span class="emp_name text-truncate font-weight-bold">'+
                                        @if(App::isLocale('en')) $bank.name @else $bank.name_ar @endif+
                                    '</span>'+
                                    '</div>'+
                                    '</div>';
                                    // $output1  += ',';
                                    // });
                                    // console.log($output1);
                                }

                                if ($bank == null){
                                    $output1  = '<span > {{__("All Countries")}}</span>'
                                }

                                // var colorClasss = $country === '' ? ' bg-light-' + $state + ' ' : '';
                                var $row_output =''+
                                    $output1 ;
                                return $row_output;
                            }
                        },

                        {
                            // Avatar image/badge, Name and post
                            targets: 4,
                            orderable: false,
                            render: function (data, type, full, meta) {
                                var $user_img = full['image'],
                                    @if(App::isLocale('en'))
                                    $name = full['name'];
                                @else
                                    $name = full['name_ar'];
                                @endif
                                // $name = full['market_name'];
                                if ($user_img) {
                                    // For Avatar image
                                    var $output =
                                        '<img src="{{asset('uploads/users/').'/'}}'+$user_img+'" alt="Avatar" width="32" height="32">';
                                } else {
                                    // For Avatar badge
                                    var stateNum = full['status'];
                                    var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                    var $state = states[stateNum],
                                        @if(App::isLocale('en'))
                                        $name = full['name'],
                                        @else
                                        $name = full['name_ar'],
                                        @endif
                                        $initials = $name.match(/\b\w/g) || [];
                                    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                    $output = '<span class="avatar-content">' + $initials + '</span>';
                                }

                                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                                // Creates full output for row
                                var $row_output =
                                    '<a href="{{route('payment.edit','').'/'}}'+full['id']+'">'+
                                    '<div class="d-flex justify-content-left align-items-center">' +
                                    // '<div class="avatar ' +
                                    // colorClass +
                                    // ' mr-1">' +
                                    // $output +
                                    // '</div>' +
                                    '<div class="d-flex flex-column">' +
                                    '<span class="emp_name text-truncate font-weight-bold">' +
                                    $name +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>';
                                return $row_output;
                            }
                        },
                        {
                            // Actions
                            targets: -2,
                            title: '{{__('Status')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-switch custom-switch-success">' +
                                    '<input type="checkbox" class="custom-control-input" onclick="changeStatus('+full.id+')" value="'+full.status+'" id="status-'+full.id+'" ' +
                                    (full.status == 1 ? 'checked': '') +
                                    ' />' +
                                    '<label class="custom-control-label" for="status-'+full.id+'">' +
                                    '<span class="switch-icon-left">'+
                                    // feather.icons['check'].toSvg({ class: 'font-small-4' })+
                                    '</span>' +
                                    // '<span class="switch-icon-right">x</span>' +
                                    '</label>' +
                                    '</div>'
                                );
                            }
                        },
                        {
                            targets: 5,
                            orderable: false,
                        },
                        {
                            targets: 6,
                            orderable: false,
                        },
                        {
                            targets: 7,
                            orderable: false,
                        },

                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (

                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'"  class="item-edit mr-1 ml-1 ">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) +


                                    '<a href="{{ route('payment.edit','')}}'+"/"+full.id+'"  class="item-edit">' +
                                    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'

                                );
                            }
                        }

                    ],
                    order: [[1, 'desc']],
                    dom:  "<'row'<'col-sm-2'l><'col-sm-7'B><'col-sm-2'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        {
                            text: feather.icons['trash-2'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Delete')}}' ,
                            className: 'delete_all btn btn-primary',
                            attr: {
                                'onclick':'deleteAll()'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                    ],
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function (row) {
                                    var data = row.data();
                                    return 'Details of ' + data['full_name'];
                                }
                            }),
                            type: 'column',
                            renderer: function (api, rowIdx, columns) {
                                var data = $.map(columns, function (col, i) {
                                    console.log(columns);
                                    return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                        ? '<tr data-dt-row="' +
                                        col.rowIndex +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>'
                                        : '';
                                }).join('');

                                return data ? $('<table class="table"/>').append(data) : false;
                            }
                        }
                    },
                    language: {
                        "lengthMenu": "{{__('Show')}} _MENU_ {{__('entries')}}",
                        "processing":     "{{__('Processing...')}}",
                        "search":         "{{__('Search:')}}",
                        "info":           "{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}",
                        "zeroRecords":    "{{__('No matching records found')}}",
                        "emptyTable":     "{{__('No data available in table')}}",
                        "infoEmpty":      "{{__('Showing')}} 0 {{__('to')}} 0 {{__('of')}} 0 {{__('entries')}}",
                        "infoFiltered":   "({{__('filtered from')}} _MAX_ {{__('total entries')}} )",
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });

            }


        });

    </script>
    <script>
        $(function () {
            'use strict';

            var dt_basic_table = $('.datatables-basic2'),
                assetPath = '{{asset('app-assets/')}}';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }

            // DataTable with buttons
            // --------------------------------------------------------------------

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('payment.get_payment_method')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'name' },
                        { data: 'order_count' },
                        { data: '' },
                        { data: '' },
                    ],
                    columnDefs: [
                        {
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            responsivePriority: 2,
                            targets: 0
                        },
                        {
                            // For Checkboxes
                            targets: 1,
                            orderable: false,
                            responsivePriority: 3,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input dt-checkboxes sub_chk" name="" type="checkbox" value="'+full.id+'" id="checkbox' +
                                    data +
                                    '" /><label class="custom-control-label" for="checkbox' +
                                    data +
                                    '"></label></div>'
                                );
                            },
                            checkboxes: {
                                selectAllRender:
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>'
                            }
                        },
                        {
                            targets: 2,
                            visible: false
                        },



                        {
                            // Avatar image/badge, Name and post
                            targets: 3,
                            responsivePriority: 4,
                            render: function (data, type, full, meta) {
                                var $user_img = full['image'],
                                    @if(App::isLocale('en'))
                                    $name = full['name'];
                                @else
                                    $name = full['name_ar'];
                                @endif
                                // $name = full['market_name'];
                                if ($user_img) {
                                    // For Avatar image
                                    var $output =
                                        '<img src="{{asset('uploads/users/').'/'}}'+$user_img+'" alt="Avatar" width="32" height="32">';
                                } else {
                                    // For Avatar badge
                                    var stateNum = full['status'];
                                    var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                    var $state = states[stateNum],
                                        @if(App::isLocale('en'))
                                        $name = full['name'],
                                        @else
                                        $name = full['name_ar'],
                                        @endif
                                        $initials = $name.match(/\b\w/g) || [];
                                    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                    $output = '<span class="avatar-content">' + $initials + '</span>';
                                }

                                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                                // Creates full output for row
                                var $row_output =
                                    '<a href="{{route('payment.payment_edit','').'/'}}'+full['id']+'">'+
                                    '<div class="d-flex justify-content-left align-items-center">' +
                                    // '<div class="avatar ' +
                                    // colorClass +
                                    // ' mr-1">' +
                                    // $output +
                                    // '</div>' +
                                    '<div class="d-flex flex-column">' +
                                    '<span class="emp_name text-truncate font-weight-bold">' +
                                    $name +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>';
                                return $row_output;
                            }
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 4,
                            orderable: false,
                            render: function (data, type, full, meta) {
                                var $order_count = full['order_count'];
                                // console.log($order_count)


                                // $name = full['market_name'];
                                if ($order_count>=0) {
                                    // For Avatar image
                                    var $output1=''

                                    $output1  +=
                                        '<a href="{{route('payment.orders','').'/'}}'+full['id']+'">'+
                                        '{{__("Show Orders")}}'+
                                        '('+
                                        $order_count+
                                        ')'+
                                        '</a>';

                                }
                                else {
                                    $output1  += '<span > {{__("Not Found")}}</span>'
                                }
                                var $row_output =''+
                                    $output1 ;
                                return $row_output;
                            }
                        },
                        {
                            // Actions
                            targets: -2,
                            title: '{{__('Status')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-switch custom-switch-success">' +
                                    '<input type="checkbox" class="custom-control-input" onclick="changeStatusPayment('+full.id+')" value="'+full.status+'" id="status1-'+full.id+'" ' +
                                    (full.status == 1 ? 'checked': '') +
                                    ' />' +
                                    '<label class="custom-control-label" for="status1-'+full.id+'">' +
                                    '<span class="switch-icon-left">'+
                                    // feather.icons['check'].toSvg({ class: 'font-small-4' })+
                                    '</span>' +
                                    // '<span class="switch-icon-right">x</span>' +
                                    '</label>' +
                                    '</div>'
                                );
                            }
                        },


                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (

                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'"  class="item-edit mr-1 ml-1">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'+
                                    '<a href="{{ route('payment.payment_edit','')}}'+"/"+full.id+'"  class="item-edit">' +
                                    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'

                                );
                            }
                        }

                    ],
                    order: [[1, 'desc']],
                    dom:  "<'row'<'col-sm-2'l><'col-sm-7'B><'col-sm-2'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        {
                            text: feather.icons['trash-2'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Delete')}}' ,
                            className: 'delete_all btn btn-primary',
                            attr: {
                                'onclick':'deletePaymentAll()'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                    ],
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function (row) {
                                    var data = row.data();
                                    return 'Details of ' + data['full_name'];
                                }
                            }),
                            type: 'column',
                            renderer: function (api, rowIdx, columns) {
                                var data = $.map(columns, function (col, i) {
                                    console.log(columns);
                                    return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                        ? '<tr data-dt-row="' +
                                        col.rowIndex +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>'
                                        : '';
                                }).join('');

                                return data ? $('<table class="table"/>').append(data) : false;
                            }
                        }
                    },
                    language: {
                        "lengthMenu": "{{__('Show')}} _MENU_ {{__('entries')}}",
                        "processing":     "{{__('Processing...')}}",
                        "search":         "{{__('Search:')}}",
                        "info":           "{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}",
                        "zeroRecords":    "{{__('No matching records found')}}",
                        "emptyTable":     "{{__('No data available in table')}}",
                        "infoEmpty":      "{{__('Showing')}} 0 {{__('to')}} 0 {{__('of')}} 0 {{__('entries')}}",
                        "infoFiltered":   "({{__('filtered from')}} _MAX_ {{__('total entries')}} )",
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });

            }


        });

    </script>
    {{--    Add new Bank Account--}}


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

            $(document).on("click", "#addBankAccount", function() {
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#addBankAccount').html('');
                    $('#addBankAccount').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('payment.store')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#addBankAccount').empty();
                            $('#addBankAccount').html('{{__('Save')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            document.getElementById("add_bank_account").reset();
                            $('.datatables-basic').DataTable().ajax.reload();
                            $('.custom-error').remove();
                            $('#modals-slide-in').modal('hide');
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#addBankAccount').empty();
                            $('#addBankAccount').html('{{__('Save')}}');
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
    {{--    Add new Payment--}}
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

            $(document).on("click", "#addPayment", function() {
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#addPayment').html('');
                    $('#addPayment').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('payment.addPayment')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#addPayment').empty();
                            $('#addPayment').html('{{__('Save')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            document.getElementById("add_payment").reset();
                            $('.datatables-basic2').DataTable().ajax.reload();
                            $('.custom-error').remove();
                            $('#modals-slide-in2').modal('hide');
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#addPayment').empty();
                            $('#addPayment').html('{{__('Save')}}');
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
    {{--    add LozCart--}}

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

            $(document).on("click", "#add_LozCart", function() {
                var $form = $(this.form);
                if(! $form.valid()) {
                    $('#add_LozCart').animate({
                        scrollTop: ($('.error').offset().top - 300)
                    }, 2000);
                    return false
                };
                if ($form.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#add_LozCart').html('');
                    $('#add_LozCart').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Sending')}}...</span>');
                    $.ajax({
                        url: "{{ route('payment.lozCart')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#add_LozCart').empty();
                            $('#add_LozCart').html('{{__('Send')}}');
                            {{--$('.payActiveBtnlozCart').html('{{__('Deactivate')}}');--}}
                            {{--$('.payActiveBtnlozCart').addClass('deactivate_lozCart');--}}
                            {{--$('.deactivate_lozCart').removeClass('btn-success');--}}
                            {{--$('.deactivate_lozCart').removeAttr('data-toggle');--}}
                            {{--$('.deactivate_lozCart').removeAttr('data-target');--}}
                            {{--$('.deactivate_lozCart').addClass('btn-danger');--}}
                            {{--$('.deactivate_lozCart').removeClass('payActiveBtnlozCart');--}}
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);

                            $('.custom-error').remove();
                            $('#addLozCart').modal('hide');
                            window.location.href = '{{route('payment.index')}}';
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#add_LozCart').empty();
                            $('#add_LozCart').html('{{__('Save')}}');
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
    {{--    Edit LozCart--}}

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

            $(document).on("click", "#edit_LozCart", function() {
                var $form = $(this.form);
                if(! $form.valid()) {
                    $('html, body').animate({
                        scrollTop: ($('.error').offset().top - 300)
                    }, 2000);
                    return false
                };
                if ($form.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#edit_LozCart').html('');
                    $('#edit_LozCart').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Sending')}}...</span>');
                    $.ajax({
                        url: "{{ route('payment.lozCartUpdate')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#edit_LozCart').empty();
                            $('#edit_LozCart').html('{{__('send')}}');
                            {{--$('.payActiveBtnlozCart').html('{{__('Deactivate')}}');--}}
                            {{--$('.payActiveBtnlozCart').addClass('deactivate_lozCart');--}}
                            {{--$('.deactivate_lozCart').removeClass('btn-success');--}}
                            {{--$('.deactivate_lozCart').removeAttr('data-toggle');--}}
                            {{--$('.deactivate_lozCart').removeAttr('data-target');--}}
                            {{--$('.deactivate_lozCart').addClass('btn-danger');--}}
                            {{--$('.deactivate_lozCart').removeClass('payActiveBtnlozCart');--}}
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);

                            $('.custom-error').remove();
                            $('#editLozCart').modal('hide');
                            window.location.href = '{{route('payment.index')}}';
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#add_LozCart').empty();
                            $('#add_LozCart').html('{{__('Save')}}');
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

    {{--    change status LozCart--}}
    <script type="text/javascript">


        function changeStatusLozCart(e,id) {
            e.preventDefault()
            swal.fire({
                title: "{{__('Warning')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes')}}",
                cancelButtonText: "{{__('No')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var x = document.getElementById("status-"+id).value;
                    if (x == 1) {
                        document.getElementById("status-"+id).value = 0
                    }
                    if (x == 0) {
                        document.getElementById("status-"+id).value = 1
                    }
                    var status_new = document.getElementById("status-"+id).value;
                    var token = $('meta[name="csrf-token"]').attr('content');
                    // var idRow = document.getElementById("user_row_" + id)

                    $.ajax({
                        url: "{{ url("payment/status_LozCart")}}" + '/' + id,
                        type: "POST",
                        data: {
                            status: status_new,
                            _token: token,

                        },
                        success: function (response) {
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            if(status_new==1){
                                $("#status-"+id).prop("checked", true)
                            }
                            if(status_new==0){
                                $("#status-"+id).prop("checked", false)
                            }

                            // $('.datatables-basic').DataTable().ajax.reload();

                        },
                        error: function (data) {
                            var response = data.responseJSON;
                            if (data.status == 422) {
                                if (typeof (response.responseJSON) != "undefined") {
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
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 2000);
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>

    {{--    add PayPal--}}

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

            $(document).on("click", "#add_PayPal", function() {
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#add_PayPal').html('');
                    $('#add_PayPal').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('payment.payPal')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#add_PayPal').empty();
                            $('#add_PayPal').html('{{__('Save')}}');
                            {{--$('.payActiveBtnPayPal').html('{{__('Deactivate')}}');--}}
                            {{--$('.payActiveBtnPayPal').addClass('deactivate_payPal');--}}
                            {{--$('.deactivate_payPal').removeClass('btn-success');--}}
                            {{--$('.deactivate_payPal').removeAttr('data-toggle');--}}
                            {{--$('.deactivate_payPal').removeAttr('data-target');--}}
                            {{--$('.deactivate_payPal').addClass('btn-danger');--}}
                            {{--$('.deactivate_payPal').removeClass('payActiveBtnPayPal');--}}
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            // document.getElementById("add_bank_account").reset();
                            // $('.datatables-basic').DataTable().ajax.reload();
                            $('.custom-error').remove();
                            $('#addPayPal').modal('hide');
                            window.location.href = '{{route('payment.index')}}';
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#add_PayPal').empty();
                            $('#add_PayPal').html('{{__('Save')}}');
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
    {{--    change status PayPal--}}
    <script type="text/javascript">
        // $('#status-'+2).on('click', function(e){
        //     e.stopPropagation();
        //     console.log('fdsfsdf')
        //     alert('Child : waaaaaa waaaa waa huh huh waaa waaaa!');
        // });
        // ev.allowSubmit = true;
        function changeStatusPayPal(e,id) {


            e.preventDefault()
            swal.fire({
                title: "{{__('Warning')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes')}}",
                cancelButtonText: "{{__('No')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var x = document.getElementById("status-"+id).value;
                    if (x == 1) {
                        document.getElementById("status-"+id).value = 0
                    }
                    if (x == 0) {
                        document.getElementById("status-"+id).value = 1
                    }
                    var status_new = document.getElementById("status-"+id).value;
                    var token = $('meta[name="csrf-token"]').attr('content');
                    // var idRow = document.getElementById("user_row_" + id)

                    $.ajax({
                        url: "{{ url("payment/status_payPal")}}" + '/' + id,
                        type: "POST",
                        data: {
                            status: status_new,
                            _token: token,

                        },
                        success: function (response) {
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            if(status_new==1){
                                $("#status-"+id).prop("checked", true)
                            }
                            if(status_new==0){
                                $("#status-"+id).prop("checked", false)
                            }
                            console.log(e);
                            // e.click()
                            // $('.datatables-basic').DataTable().ajax.reload();

                        },
                        error: function (data) {
                            var response = data.responseJSON;
                            if (data.status == 422) {
                                if (typeof (response.responseJSON) != "undefined") {
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
                                setTimeout(function () {
                                    toastr['error'](
                                        response.message,
                                        {
                                            closeButton: true,
                                            tapToDismiss: false
                                        }
                                    );
                                }, 2000);
                            }
                        }
                    });
                    // console.log(this)

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
    {{--    change status Payment--}}
    <script type="text/javascript">

        // ev.allowSubmit = true;
        function changeStatusPayment(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            var x = document.getElementById("status1-"+id).value;
            if (x == 1) {
                document.getElementById("status1-"+id).value = 0
            }
            if (x == 0) {
                document.getElementById("status1-"+id).value = 1
            }
            var status_new = document.getElementById("status1-"+id).value;
            var token = $('meta[name="csrf-token"]').attr('content');
            // var idRow = document.getElementById("user_row_" + id)

            $.ajax({
                url: "{{ url("payment/status_payment")}}" + '/' + id,
                type: "POST",
                data: {
                    status: status_new,
                    _token: token,

                },
                success: function (response) {
                    setTimeout(function () {
                        toastr['success'](
                            @if(App::isLocale('en'))
                                response.massage_en,
                            @else
                                response.massage_ar,
                                @endif
                            {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 200);

                    $('.datatables-basic2').DataTable().ajax.reload();

                },
                error: function (data) {
                    var response = data.responseJSON;
                    if (data.status == 422) {
                        if (typeof (response.responseJSON) != "undefined") {
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
                        setTimeout(function () {
                            toastr['error'](
                                response.message,
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 2000);
                    }
                }
            });
        }
    </script>

    {{--    delete One Row--}}
    <script type="text/javascript">
        function deleteRow(id) {
            // var idRow =document.getElementById("role_row_"+id)
            swal.fire({
                title: "{{__('Delete')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes, delete!')}}",
                cancelButtonText: "{{__('No, cancel!')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'delete',
                        url: "{{ url("payment/delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                @if(App::isLocale('en'))
                                swal.fire("{{__('Done!')}}", response.massage_en, "success");
                                @else
                                swal.fire("{{__('Done!')}}", response.massage_ar, "success");
                                @endif
                                $('.datatables-basic').DataTable().ajax.reload();

                            } else {
                                swal.fire("{{__('Error!')}}", response.msg, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
    {{--    delete Payment One Row--}}
    <script type="text/javascript">
        function deleteRowPayment(id) {
            // var idRow =document.getElementById("role_row_"+id)
            swal.fire({
                title: "{{__('Delete')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes, delete!')}}",
                cancelButtonText: "{{__('No, cancel!')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'delete',
                        url: "{{ url("payment/payment_delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                @if(App::isLocale('en'))
                                swal.fire("Done!", response.massage_en, "success");
                                @else
                                swal.fire("Done!", response.massage_ar, "success");
                                @endif
                                $('.datatables-basic2').DataTable().ajax.reload();

                            } else {
                                swal.fire("Error!", response.msg, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
    {{--    change status--}}
    <script type="text/javascript">

        // ev.allowSubmit = true;
        function changeStatus(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            var x = document.getElementById("status-"+id).value;
            if (x == 1) {
                document.getElementById("status-"+id).value = 0
            }
            if (x == 0) {
                document.getElementById("status-"+id).value = 1
            }
            var status_new = document.getElementById("status-"+id).value;
            var token = $('meta[name="csrf-token"]').attr('content');
            // var idRow = document.getElementById("user_row_" + id)

            $.ajax({
                url: "{{ url("payment/status")}}" + '/' + id,
                type: "POST",
                data: {
                    status: status_new,
                    _token: token,

                },
                success: function (response) {
                    setTimeout(function () {
                        toastr['success'](
                            @if(App::isLocale('en'))
                                response.massage_en,
                            @else
                                response.massage_ar,
                                @endif
                            {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 200);

                    $('.datatables-basic').DataTable().ajax.reload();

                },
                error: function (data) {
                    var response = data.responseJSON;
                    if (data.status == 422) {
                        if (typeof (response.responseJSON) != "undefined") {
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
                        setTimeout(function () {
                            toastr['error'](
                                response.message,
                                {
                                    closeButton: true,
                                    tapToDismiss: false
                                }
                            );
                        }, 2000);
                    }
                }
            });
        }
    </script>
    {{--    delete All--}}
    <script>
        // $('.delete_all').on('click', function(e) {
        function deleteAll(id) {

            var allVals = [];
            $(".sub_chk:checked").each(function () {
                allVals.push($(this).val());
            });


            if (allVals.length <= 0) {
                swal.fire({
                    title: "{{__('No items selected?')}}",
                    text: "{{__('Please select items to complete the process')}}",
                    type: "warning",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: '{{__('Ok')}}',
                    cancelButtonText: '{{__('No, cancel!')}}',
                    reverseButtons: false
                });
            } else {

                swal.fire({
                    title: "{{__('Delete')}}",
                    text: "{{__('Please confirm approval')}}",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "{{__('Yes, delete!')}}",
                    cancelButtonText: "{{__('No, cancel!')}}",
                    cancelButtonClass: 'btn-success',
                    confirmButtonClass: 'btn-danger',
                    reverseButtons: !0
                }).then(function (event) {
                    if (event.value === true) {


                        var join_selected_values = allVals.join(",");

// console.log($(this).data('url'))
                        $.ajax({
                            url: "{{ route('payment.delete_all') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("Done!", response.msg, "success");
                                    $('.datatables-basic').DataTable().ajax.reload();

                                } else {
                                    swal.fire("Error!", response.msg, "error");
                                }
                            }
                        });

                    } else {
                        event.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })

            }
        }
        // });
    </script>
    {{--    delete Payment All--}}
    <script>
        // $('.delete_all').on('click', function(e) {
        function deletePaymentAll(id) {

            var allVals = [];
            $(".sub_chk:checked").each(function () {
                allVals.push($(this).val());
            });


            if (allVals.length <= 0) {
                swal.fire({
                    title: "{{__('No items selected?')}}",
                    text: "{{__('Please select items to complete the process')}}",
                    type: "warning",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: '{{__('Ok')}}',
                    cancelButtonText: '{{__('No, cancel!')}}',
                    reverseButtons: false
                });
            } else {

                swal.fire({
                    title: "{{__('Delete')}}",
                    text: "{{__('Please confirm approval')}}",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "{{__('Yes, delete!')}}",
                    cancelButtonText: "{{__('No, cancel!')}}",
                    cancelButtonClass: 'btn-success',
                    confirmButtonClass: 'btn-danger',
                    reverseButtons: !0
                }).then(function (event) {
                    if (event.value === true) {


                        var join_selected_values = allVals.join(",");

// console.log($(this).data('url'))
                        $.ajax({
                            url: "{{ route('payment.payment_delete_all') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("Done!", response.msg, "success");
                                    $('.datatables-basic2').DataTable().ajax.reload();

                                } else {
                                    swal.fire("Error!", response.msg, "error");
                                }
                            }
                        });

                    } else {
                        event.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })

            }
        }
        // });
    </script>


    {{--    show and hide input --}}
    <script>
        $('#paiement_when_receiving').on("change",function ()
        {
            if ($('#paiement_when_receiving').is(":checked")){
                $('#delivery_cost_block').show();
            }else {
                $('#delivery_cost_block').hide();
            }
        });

    </script>
    {{--    validate is number--}}
    <script>
        function isInputNumber(evt, value) {

            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9.]/.test(ch))) {
                evt.preventDefault();
            }

        }
    </script>
    {{--    get countries --}}
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
                    '<img class=" flag-icon flag-icon-squared" src="http://lozcart.com/admin/public/uploads/countries/'+country.flag+'"/>'+
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
    {{--    get countries in modal--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#country_id_modal').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}}, flag: "{{$country->flag}}", text: '{{ $country->name}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];
            function formatCountry(country) {
                if (!country.id) { return country.text; }
                var $country = $(
                    {{--'<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+--}}
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text + '</span>'
                );
                return $country;
            };
            function formatState2 (country) {

                if (!country.id) {
                    return country.text;
                }
                var $country = $(
                    {{--'<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+--}}
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text + '</span>'
                );

                return $country;

            };
            $("#country_id_modal").select2({
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
    {{--    on change country get banks--}}
    <script>
        $(function () {
            banks();
            $(document).on('change', '#country_id_modal', function() {
                banks();
                return false;
            });
            function banks() {
                $('option', $('#bank_id')).remove();
                $('#bank_id').append($('<option></option>').val('').html(' --- '));
                var countryIdVal = $('#country_id_modal').val() != null ? $('#country_id_modal').val() : '{{ old('country_id_modal') }}';
                $.get("{{ route('payment.get_banks') }}", { country_id: countryIdVal }, function (data) {
                    $.each(data.banks, function(val, text) {
                        // console.log(text.name)
                        var selectedVal = val == '{{ old('city_id') }}' ? "selected" : "";
                        @if(App::isLocale('en'))
                        $('#bank_id').append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name));
                        @else
                        $('#bank_id').append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name_ar));
                        @endif
                    })
                    $('#basic-addon2').empty().text(data.code);
                }, "json");
            }

        });
    </script>
    <script>
        $(document).ready(function(){
            $('#business_type').on('change', function() {
                console.log(this.value)
                if ( this.value == '1')
                {
                    $("#div_business_registration_no").hide();
                    $("#business_registration_no").attr('disabled', true);
                }
                else
                {
                    $("#div_business_registration_no").show();
                    $("#business_registration_no").attr('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#identity_type').on('change', function() {
                console.log(this.value)
                if ( this.value == '1')
                {
                    $("#div_identity_photo_b").hide();
                    $("#identity_photo_b").attr('disabled', true);
                }
                else
                {
                    $("#div_identity_photo_b").show();
                    $("#identity_photo_b").attr('disabled', false);
                }
            });
        });
    </script>
    {{--    <script src="{{asset('assets\js\bootstrap-datepicker.min.js')}}" ></script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function(){--}}
    {{--            $('#datepicker').datepicker();--}}
    {{--        });--}}
    {{--        console.log('jkfjksd')--}}
    {{--    </script>--}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script>
        @if (! $lozCart)
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
            // useCurrent: true,
            // defaultDate:today
        });
        @endif
        @if ($lozCart)
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'


        });
        @endif
    </script>
    <script>
        $(document).ready(function() {

            // $form = $('#form_data');
            $(function () {
                'use strict';

                var addPaypal = $('#add_paypal');
// console.log(addClient)
                // jQuery Validation
                // --------------------------------------------------------------------
                if (addPaypal.length) {
                    addPaypal.validate({

                        rules: {

                            email: {
                                required: true,
                                email: true
                            },
                            client_id: {
                                required: true,
                                client_id: true,
                                minlength: 40
                            },
                            secret_id: {
                                required: true,
                                secret_id: true,
                                minlength: 40
                            },


                        }
                    });
                }
            });
            $.validator.addMethod('secret_id', function (value) {
                return /^[\w-_.%@#+=]*$/.test(value);
            }, '{{__("Please enter the Secret ID correctly")}}');
            $.validator.addMethod('client_id', function (value) {
                return /^[\w-_.%@#+=]*$/.test(value);
            }, '{{__("Please enter the Client ID correctly")}}');
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
@endsection

@extends('dashboard.layouts.app')
@section('style')

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
    @if(App::isLocale('en'))
    @else

    @endif
    <style>

        .checkBtn.copun {
            position: relative;
        }
        .checkBtn.copun input {
            padding: 10px 5px !important;
            height: 100%!important;
            border-radius: 4px;
        }
        .checkBtn.copun button {
            padding: 8px 25px;
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 5px !important;
            z-index: 222;
        }
        .btn-style {
            background-image:linear-gradient(
                -157deg
                , #096d3e 0%, #096d3e 100%);
            display: inline-block;
            border: 0;
            text-align: center;
            border-radius: 0;
            color: #fff !important;
            padding: 26px 40px;
            font-size: 16px;
            cursor: pointer;
            line-height: 0;
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h4 class="card-header mb-3">{{__('Summary of the purchase process')}}</h4>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="table-responsive p-2">

                                        <div style="text-align:center;font-weight: 700;">
                                            {{__('Subscription details')}}
                                        </div>
                                        <br  >
                                        <table id="summary" class="table table-centered table-striped mb-0 colorInv">
                                            <tbody>
                                            <tr>

                                                <td style="font-weight: 700;">{{__('Operation')}}</td>
                                                <td class="text-right">{{__('Account upgrade')}}</td>
                                            </tr>
                                            <tr>

                                                <td style="font-weight: 700;">{{__('Plan')}}</td>
                                                <td class="text-right">
                                                    @if(App::isLocale('en'))
                                                        {{$plan->title}}
                                                    @else
                                                        {{$plan->title_ar}}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>

                                                <td style="font-weight: 700;">{{__('Subscription type')}}</td>
                                                <td class="text-right">
                                                    @if(App::isLocale('en'))
                                                        {{$type}}
                                                    @else
                                                        {{$type_ar}}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>

                                                <td style="font-weight: 700;">{{__('Plan Price')}}</td>
                                                <td class="text-right">
                                                    {{$price}} {{__('USD')}}
                                                    <input type="text" name="price" id="price" value="{{$price}}" hidden>
                                            </tr>
                                            <tr>
                                                <td colspan="10" style="padding: 0.85rem .3rem;">
                                                    <div class="text-center">

                                                        <div class="input-group checkBtn  copun">
                                                            <input value="" style="" name="promo_code" id="promo_code" type="text" class="form-control" placeholder="كوبون الخصم">
                                                            <div class="input-group-prepend" style="">
                                                                <button  class="btn btn-style checkCoupon" type="button"> {{__('Check')}} </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr id="discount_row" style="display: none" >
                                                <td style="font-weight:800!important;text-decoration: dotted;color:#4d4d4d">
                                                    {{__('Discount')}}
                                                </td>
                                                <td class="text-right" id="discount">
                                                </td>
                                            </tr>
                                            <tr style="font-weight: bold!important;font-size: 16px;">
                                                <td style="font-weight:800!important;text-decoration: dotted;color:#4d4d4d">
                                                    {{__('Total')}}
                                                </td>
                                                <td class="text-right" id="all_sub_total">
                                                    {{$price}} {{__('USD')}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->

                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div class="row h-100">

                                        <div class="col-md-12">
                                            <div style="display: flex;justify-content: center;align-items: flex-end;height: 100% ">
                                                <div class="text-center payment">
                                                    <br>

                                                    <div class="row align-items-center justify-content-center ">


                                                        <form  method="POST"  role="form" action="{{route('paypal.pay')}}" >
                                                            @csrf
                                                            <input type='text' name="time" value="{{$type}}" class='form-control ' hidden >
                                                            <input type='text' name="plan_id" value="{{$plan->id}}" class='form-control ' hidden >
                                                            <input type='text' name="name" value="{{$plan->title}}" class='form-control ' hidden >
                                                            <input type='text' name="amount" id="amount" value="{{$price}}" class='form-control ' hidden >
                                                            <input type='text' name="coupon_id" id="coupon_id" value="" class='form-control ' hidden >
                                                            <input type='text' name="currency" value="{{$country_store->country->currency_short}}" class='form-control ' hidden >


                                                            {{--                                                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">--}}
                                                            {{--                                                            <label for="amount" class="col-md-4 control-label">Enter Amount</label>--}}

                                                            {{--                                                            <div class="col-md-6">--}}
                                                            {{--                                                                <input id="amount" type="text" class="form-control" name="amount" value="{{ old('amount') }}" autofocus>--}}

                                                            {{--                                                                @if ($errors->has('amount'))--}}
                                                            {{--                                                                    <span class="help-block">--}}
                                                            {{--                                        <strong>{{ $errors->first('amount') }}</strong>--}}
                                                            {{--                                    </span>--}}
                                                            {{--                                                                @endif--}}
                                                            {{--                                                            </div>--}}
                                                            {{--                                                        </div>--}}

                                                            <div class="form-group">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-success">
                                                                        {{__('Pay the bill through PayPal')}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end card-box-->
                    </div> <!-- end col -->
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <div id="modal" class="modal fade modal-success show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header" style="background-color:white">
                    <h5 class="modal-title" id="myModalLabel140">{{__('Warning')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{__('Dear subscriber, your choice of this plan will remove the previously subscribed plan')}}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect waves-float waves-light" data-dismiss="modal">{{__('Ok')}}</button>
                </div>

            </div>
        </div>
    </div>

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

    @if($current_plan->plan_id !=$plan->id)
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modal').modal('show');
            });
        </script>
    @endif
    <script>
        $(document).on('click', '.checkCoupon', function (e) {
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            e.preventDefault();
            let promo_code = $('#promo_code').val();
            let price = $('#price').val();
            let url = $(this).data('url');
            if (promo_code !== "") {
                $.ajax({
                    type: "POST",
                    url: "{{ route('coupon.checkSubscriptionCoupon')}}",
                    data: {
                        'promo_code': promo_code,
                        'price': price,
                    },
                    success: function (data) {
                        if (data.status === 1) {
                            console.log(data)
                            $('#amount').val(data.final_price)
                            $('#coupon_id').val(data.coupon_id)
                            $('#discount_row').show()

                            $('#discount').html(data.coupon)
                            $('#all_sub_total').html(data.final_price)
                            swal.fire({
                                type: 'success',
                                title: data.message,
                                timer: 4000,
                                confirmButtonText: "{{__('Done')}}"
                            });

                        } else {
                            swal.fire({
                                type: 'error',
                                title: data.message,
                                timer: 4000,
                                confirmButtonText: "{{__('Done')}}",
                            });
                        }
                    },
                    error: function (data) {
                        swal.fire({
                            type: 'error',
                            title: "{{__('Sorry: an unexpected error occurred.. Please try again later.')}}",
                            timer: 4000,
                            confirmButtonText: "{{__('Done')}}",
                        });
                    },
                    complete: function (data) {
                        //location.reload();
                        /*setTimeout(function () {
                            $('#refreshSubscriptionUpdate').submit();
                        }, 2000); //will call the function after 2 secs.*/

                    }
                });
            } else {
                swal.fire({
                    type: 'info',
                    title: "{{__('Please, enter the coupon')}}",
                    timer: 4000
                });
            }
        });

    </script>
@endsection

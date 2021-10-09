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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 17px;
        }
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
    @if(App::isLocale('en'))
    @else

    @endif

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
                            <div class="card-body">
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
                                                    <td class="text-right" >
                                                        {{$price}} {{__('USD')}}
                                                    </td>
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 style="color: #908e8e;">
                                                    {{__('Saved cards : ')}}
                                                </h5>
                                                <div class="cards d-flex">
                                                    @foreach($cards as $card)
                                                        <div id="card_{{$card->id}}">
                                                            <a href="javascript:;" class="btn btn-info ml-1 mr-1 " onclick="pasteCard({{$card->id}})">
                                                                {{str_pad( substr($card->no, -4), strlen($card->no), '*', App::isLocale('en')?STR_PAD_LEFT:STR_PAD_RIGHT)}}

                                                            </a>
                                                            <a href="javascript:;"  onclick="deleteRow({{$card->id}})"  data-value="{{$card->id}}" class="btn btn-danger  mr-1 ">
                                                                <i data-feather="trash-2"></i>
                                                            </a>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="text-center payment">
                                                    <br>

                                                    <div class="row ">

                                                        {{--                                            <article class="card" style="position: relative;top:-30px">--}}
                                                        {{--                                                <br>--}}
                                                        {{--                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>--}}


                                                        {{--                                                <div id="root"><form id="gosell-gateway-form-container" method="post"><div id="gosell-gateway-element-container"><div id="privateTapElement" style="height:inherit;margin: 0px !important; padding: 0px !important; border: medium none !important; display: block !important; background: transparent none repeat scroll 0% 0% !important; position: relative !important; opacity: 1 !important; width:100%;"><iframe id="myFrame" name="myFrame" title="Secure payment input" allowpaymentrequest="true" style="border: none !important;margin: 0px !important;padding: 0px !important;min-width: 100% !important;overflow: hidden !important;display: block !important;" src="https://secure.gosell.io/tappaymentwidget/public//tap_payment_widget_ui?style[base][color]=%23535353&amp;style[base][lineHeight]=18px&amp;style[base][fontFamily]=SST%20Arabic&amp;style[base][fontSmoothing]=antialiased&amp;style[base][fontSize]=16px&amp;style[base][::placeholder][color]=rgba(0%2C%200%2C%200%2C%200.26)&amp;style[base][::placeholder][fontSize]=15px&amp;style[invalid][color]=red&amp;style[invalid][iconColor]=%23fa755a%20&amp;key=pk_live_IdAZbeNMGftyCS6PnvLHJ3FX&amp;currencyCode=all&amp;labels[cardNumber]=%D8%B1%D9%82%D9%85%20%D8%A7%D9%84%D8%A8%D8%B7%D8%A7%D9%82%D8%A9&amp;labels[expirationDate]=MM%2FYY&amp;labels[cvv]=CVV&amp;labels[cardHolder]=%D8%A7%D8%B3%D9%85%20%D8%B5%D8%A7%D8%AD%D8%A8%20%D8%A7%D9%84%D8%A8%D8%B7%D8%A7%D9%82%D8%A9&amp;labels[actionButton]=%D8%AF%D9%81%D8%B9&amp;paymentAllowed=all&amp;TextDirection=rtl" height="150"></iframe></div></div></form></div>--}}
                                                        {{--                                                <p id="msg"></p>--}}
                                                        {{--                                                <button id="submit-elements" class="btn btn-primary btn-block completePayOnlineBtn" onclick="goSell.submit()"><span class="dripicons-card" style="vertical-align: middle;"></span> إتمام--}}
                                                        {{--                                                    عملية الدفع--}}
                                                        {{--                                                    <span class="fa fa-angle-left mx-2 arrowIcon"></span>--}}
                                                        {{--                                                </button>--}}

                                                        {{--                                                <!-- Tap pay button -->--}}





                                                        {{--                                            </article>--}}
                                                        <div class="card col-md-12">
                                                            <div class="card-header text-center ">
                                                                <h5>{{__('You can pay with all credit cards, your card will be saved for the next billing')}}</h5>

                                                                <div>
                                                                    <img class="card-text  w-100" src="{{asset('photo/cards1.png')}}" alt="">
                                                                </div>
                                                                <div class="w-100 mt-3">
                                                                    <h5 style="color: #908e8e;">
                                                                        {{__('Enter your credit card information')}}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <form role="form" action="{{ route('plan.stripe') }}" method="post" class="require-validation pay " data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                                                    @csrf
                                                                    <div class='form-row '>
                                                                        <div class='col-xs-12 col-md-6 form-group required'>
                                                                            {{--                                    <label class='control-label'>Name on Card</label>--}}
                                                                            <input class='form-control'  placeholder="{{__('Name on Card')}}" name="name" size='4' type='text'>
                                                                        </div>
                                                                        <div class='col-xs-12 col-md-6 form-group required'>
                                                                            {{--                                    <label class='control-label'></label>--}}
                                                                            <input autocomplete='off'  placeholder="{{__('Card Number')}}" id="card-number" class='form-control card-number' name="no" maxlength="19" type='number'>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row mt-3">
                                                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                                            {{--                                    <label class='control-label'>CVC</label>--}}
                                                                            <input autocomplete='off' class='form-control card-cvc'  name="cvc" placeholder='ex. 311' size='4' type='number'>
                                                                        </div>
                                                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                            {{--                                    <label class='control-label'>Expiration Month</label>--}}
                                                                            <input class='form-control card-expiry-month' data-inputmask="'mask': '99'" name="month" placeholder='MM' size='2' type='text'>
                                                                        </div>
                                                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                            {{--                                    <label class='control-label'>Expiration Year</label>--}}
                                                                            <input class='form-control card-expiry-year' data-inputmask="'mask': '9999'" name="year" placeholder='YYYY' size='4' type='text'>
                                                                        </div>
                                                                        <input type='text' name="time" value="{{$type}}" class='form-control ' hidden >
                                                                        <input type='text' name="plan_id" value="{{$plan->id}}" class='form-control ' hidden >
                                                                        <input type='text' name="amount" id="amount" value="{{$price}}" class='form-control ' hidden >
                                                                        <input type='text' name="coupon_id" id="coupon_id" value="" class='form-control ' hidden >
                                                                        <input type='text' name="currency" value="{{$country_store->country->currency_short}}" class='form-control ' hidden >

                                                                    </div>
                                                                    <div class="form-row mt-3">
                                                                        <div class=" mr-auto ml-auto ">
                                                                            <button class="btn btn-success btn-lg btn-block" id="pay" type="submit">{{__('Pay Now')}}</button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end row-->
                            </div>
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
    <script src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    console.log($form.data('stripe-publishable-key'))
                    // var stripe = Stripe($form.data('stripe-publishable-key'));
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
    <script type="text/javascript">
        function deleteRow(id) {
            var item = $('#card_' + id);
            swal.fire({
                title: "حذف؟",
                text: "الرجاء التأكيد على الموافقة",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "نعم, اتم الحذف!",
                cancelButtonText: "لا,تراجع!",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'delete',
                        url: "{{ url("card/delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                swal.fire("Done!", response.msg, "success");

                                item.fadeOut(500);
                                item.remove();
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
    <script type="text/javascript">
        function pasteCard(id) {
            var item = $('#card_' + id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                type: 'POST',
                url: "{{ url("card/get/")}}/" + id,
                dataType: 'JSON',
                success: function (response) {

                    setTimeout(function () {
                        toastr['success'](
                            response.success,
                            {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 200);
                    $('input[name="name"]').val(response.data.name)
                    $('input[name="no"]').val(response.data.no)
                    $('input[name="cvc"]').val(response.data.cvc)
                    $('input[name="month"]').val(response.data.month)
                    $('input[name="year"]').val(response.data.year)
                    console.log(response.data.name)


                },
                error: function (data) {
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

            });




        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/inputmask.js" integrity="sha512-5buUHzxCQlwfawU8sjDMpR8nLDp6mB3yI4toPQva+fAFP93hDBnp1EB67rflpTXuLrBV7N3/FyBBMAcqijZQ8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/bindings/inputmask.binding.js" integrity="sha512-J6WEJE0No+5Qqm9/T93q88yRQjvoAioXG4gzJ+eqZtLi+ZBgimZDkTiLWiljwrwnoQw+xwECQm282RJ6CrJnlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    console.log('vfdvdfb')

    </script>
    <script>
        $(document).ready(function() {

            $form = $('#payment-form');
            $(function () {
                'use strict';

                var payment_form = $('#payment-form');

                if (payment_form.length) {
                    payment_form.validate({

                        rules: {
                            'no': {
                                required: true,
                                minlength: 13,
                                maxlength: 19,
                            },

                            'name': {
                                required: true,
                            }
                            ,'year': {
                                required: true,
                                minlength: 4,
                                maxlength: 4,
                            },
                            'month': {
                                required: true,
                                minlength: 2,
                                maxlength: 2,
                            },
                            'cvc': {
                                required: true,
                                minlength: 3,
                                maxlength: 4,
                            },


                        },

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

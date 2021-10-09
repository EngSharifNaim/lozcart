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
    <link rel="stylesheet" href="{{asset('dropify_cropper/cropper.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 17px;
        }
    </style>
    <style>
        .output{
            width: 90px;
            height: 90px;
            border-radius: 20px;
            border: 3px solid #000;
        }
        /*.btn-primary:hover:not(.disabled):not(:disabled) {*/
        /*    box-shadow: unset;*/
        /*}*/
    </style>
    @if(App::isLocale('en'))
        <style>

            .copyToClipboardBtn {
                position: relative;
                outline: none;
                box-shadow: none !important;
                overflow:visible;
            }
            .copyToClipboardBtn:before {
                content: "";
                display: none;
                position: absolute;
                z-index: 9998;
                top: 35px;
                left: 15px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 5px solid rgba(0, 0, 0, 0.72);
            }
            .copyToClipboardBtn:after {
                content: "Copy ";
                display: none;
                position: absolute;
                z-index: 99999999;
                top: 40px;
                left: -37px;
                width: 100px;
                height: 36px;
                color: #fff;
                font-size: 10px;
                line-height: 36px;
                text-align: center;
                background: rgba(0, 0, 0, 0.72);
                border-radius: 3px;
            }
            .copyToClipboardBtn:hover {
                background-color: #eee;
            }
            .copyToClipboardBtn:hover:before, .copyToClipboardBtn:hover:after {
                display: block;
            }
            .copyToClipboardBtn:active, .copyToClipboardBtn:focus {
                outline: none;
            }
            .copyToClipboardBtn:active:after,
            .copyToClipboardBtn:focus:after {
                content: "Done";
            }
        </style>
    @else
        <style>

            .copyToClipboardBtn {
                position: relative;
                outline: none;
                box-shadow: none !important;
                overflow:visible;
            }
            .copyToClipboardBtn:before {
                content: "";
                display: none;
                position: absolute;
                z-index: 9998;
                top: 35px;
                left: 15px;
                width: 0;
                height: 0;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 5px solid rgba(0, 0, 0, 0.72);
            }
            .copyToClipboardBtn:after {
                content: " نسخ";
                display: none;
                position: absolute;
                z-index: 999999999;
                top: 40px;
                left: -37px;
                width: 100px;
                height: 36px;
                color: #fff;
                font-size: 10px;
                line-height: 36px;
                text-align: center;
                background: rgba(0, 0, 0, 0.72);
                border-radius: 3px;
            }
            .copyToClipboardBtn:hover {
                background-color: #eee;
            }
            .copyToClipboardBtn:hover:before, .copyToClipboardBtn:hover:after {
                display: block;
            }
            .copyToClipboardBtn:active, .copyToClipboardBtn:focus {
                outline: none;
            }
            .copyToClipboardBtn:active:after, .copyToClipboardBtn:focus:after {
                content: "تم النسخ";
            }
        </style>
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row align-items-center justify-content-center ">
                                                <div class="bankInfo">
                                                    <div>

                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            @foreach($banks as $bank)
                                                            <li class="nav-item">
                                                                <a class="nav-link {{$loop->first ?'active':''}}" id="home-tab-{{$bank->id}}" data-toggle="tab" href="#home-{{$bank->id}}" role="tab" aria-controls="home-{{$bank->id}}" aria-selected="true">
                                                                    @if(App::isLocale('en'))
                                                                        {{$bank->bank_name}}
                                                                    @else
                                                                        {{$bank->bank_name_ar}}
                                                                    @endif
                                                                </a>
                                                            </li>

                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                    <div class="tab-content" id="myTabContent">
                                                        @foreach($banks as $bank)
                                                        <div class="tab-pane fade {{$loop->first ?'show active':''}} " id="home-{{$bank->id}}" role="tabpanel" aria-labelledby="home-tab-{{$bank->id}}">
                                                            <div class="row align-items-center justify-content-center hide"  style="padding:0;">
                                                                <div class="col-sm-11">

                                                                    <h3>{{__('The name of the transferee')}} :
                                                                        <span>
                                                                            @if(App::isLocale('en'))
                                                                                {{$bank->name}}
                                                                            @else
                                                                                {{$bank->name_ar}}
                                                                            @endif

                                                                        </span>
                                                                    </h3>
                                                                    <div class="bankInfoInputs">
                                                                        <div class="bankInfoInputs-item">
                                                                            <div style="margin-block: 10px;">{{__('Account No')}} :</div>
                                                                            <span style="display: flex;">
                                                                                <p style="width: 272px;" id="acc_num_{{$bank->id}}">{{$bank->account_no}}</p>
                                                                            <button style="color: #888888 !important;height:100%;border:0;background: #f3f3f4 !important; " class="btn btn-sm btn-primary copyToClipboardBtn" data-clipboard-target="#acc_num_{{$bank->id}}">{{__('Copy')}}</button>
                                                                            </span>
                                                                        </div>
                                                                        <div class="bankInfoInputs-item">
                                                                            <div style="margin-block: 10px;">{{__('IBAN')}} :</div>
                                                                            <span style="display: flex;">
                                                                                <p style="width: 272px;" id="iban_{{$bank->id}}">{{$bank->iban}}</p>
                                                                                <button style="    color: #888888 !important;height:100%;border:0;background: #f3f3f4 !important;" class="btn btn-sm btn-primary copyToClipboardBtn" data-clipboard-target="#iban_{{$bank->id}}">{{__('Copy')}}</button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-3">
                                                                    <img src="https://mapp.sa/assets/images/al-rajhi.png" width="250" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="BankconfirmInfo row align-items-center justify-content-center ">
                                                <form class="w-75" id="sendBankconfirmInfo" action="{{route('plan.bankTransfer')}}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                                                    @csrf
{{--                                                    <input type="file" id="file" name="file">--}}
                                                    <div class="form-group">
                                                        <input type='text' name="time" value="{{$type}}" class='form-control ' hidden >
                                                        <input type='text' name="plan_id" value="{{$plan->id}}" class='form-control ' hidden >
                                                        <input type='text' name="amount" id="amount" value="{{$price}}" class='form-control ' hidden >
                                                        <input type='text' name="coupon_id" id="coupon_id" value="" class='form-control ' hidden >
                                                        <input type='text' name="currency" value="{{$country_store->country->currency_short}}" class='form-control ' hidden >


                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="customFile" class="control-label">{{__('Upload the image of the transfer')}}</label>
                                                            <input accept="image/*" id="image" required type="file" class="dropify"
                                                                   name="image"/>
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="add_form" class="btn btn-success btn-block waves-effect waves-light">
                                                        {{__('Send a bank transfer')}}
                                                    </button>
                                                </form>
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
    <script src="https://mapp.sa/cPanel/js/clipboard.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="{{asset('dropify_cropper/dropzone.min.js')}}"></script>
    <script src="{{asset('dropify_cropper/cropper.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>
    <script src="https://js.stripe.com/v2/"></script>
    <script >
        $(function() {
            var clipboard = new ClipboardJS('.copyToClipboardBtn');
            clipboard.on('success', function(e) {
                e.clearSelection();
            });
        })
    </script>

    <script>
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
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
<script>
    $('.dropify').dropify({
        messages: {
            'default': '{{__('Drag and drop a file here or click')}}',
            'replace': '{{__('Drag and drop or click to replace')}}',
            'remove':  '{{__('Remove')}}',
            'error':   '{{__('Ooops, something wrong happended.')}}'
        }
    });
    var dropify_image = $('.dropify-message p');
    if ($('#sendBankconfirmInfo').length > 0) {
        dropify_image.html('<span > ' +
            '{{__('Drag and drop a file here or click')}}' +
            '</span>'
        );
    } else {
        dropify_image.html('<span style="font-family:SSTArabic-Roman !important"> ' +
            '{{__('Drag and drop or click to replace')}}' +
            '</span>'
        );
    }


    // $('.dropify-wrapper, .dropify-wrapper .dropify-clear').css('font-family', 'SST Arabic');
    $('.dropify-wrapper>.dropify-message >.file-icon img').hide();
    $('.dropify-message img').remove();
    //$('.dropify-message .file-icon').css('color', '#7275d2!important;');

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

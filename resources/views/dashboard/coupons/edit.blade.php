@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">

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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Coupon')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('coupon.index')}}">{{__('Coupons')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Coupon')}}
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
                    <div class="card">
                        <div class="card-body">
                            <form  id="editCouponForm" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="data" class="control-label">
                                                {{__('Promo Code')}}
                                                <span style="color: red">*</span>
                                            </label>
                                            <input required="" value="{{$coupon->code}}" id="code" type="text" name="code" class="form-control" placeholder="{{__('Promo Code')}}" aria-required="true">
                                        </div>
                                        <div class="form-group col-md-12">
                                            {{--                                                    <label for="select-country1">{{__('Category')}}</label>--}}
                                            <select class="select2  form-control" name="type" id="type">
                                                @foreach($type_coupons as $item)
                                                    <option value="{{ $item->id}}" {{$coupon->type == $item->id?'selected':''}} >
                                                        @if(App::isLocale('en'))
                                                            {{$item->name}}
                                                        @else
                                                            {{$item->name_ar}}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->discount}}" id="discount" type="number" name="discount" class="form-control" placeholder="{{__('Discount')}}" aria-required="true">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="datepicker">{{__('Sale End Date')}}<span style="color: red">*</span></label>
                                            <input type="text" value="{{date('Y-m-d', strtotime($coupon->end_at))}}" name="end_at" id="datepicker" class="form-control " placeholder="{{__('Sale End Date')}}" />
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="select-country1">{{__('Are discounted products excluded?')}}</label>
                                            <select class="select2  form-control" name="is_except_offers" id="is_except_offers">

                                                <option value="1"{{$coupon->is_except_offers==1?'selected':''}} >{{__('Yes')}}</option>
                                                <option value="0" {{$coupon->is_except_offers==0?'selected':''}}>{{__('No')}}</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->min_order_grand_total}}" id="min_order_grand_total" type="number" name="min_order_grand_total" class="form-control" placeholder="{{__('Minimum amount of purchases')}}" aria-required="true">
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->uses_times_for_user}}" id="uses_times_for_user" type="number" name="uses_times_for_user" class="form-control" placeholder="{{__('The number of uses per customer')}}" aria-required="true">
                                        </div>
                                        <div class="form-group col-md-12">

                                            <input required="" value="{{$coupon->countuse}}" id="countuse" type="number" name="countuse" class="form-control" placeholder="{{__('The number of times the total use')}}" aria-required="true">
                                        </div>
                                    </div>


                                    <button id="edit_coupon"  type="button" class=" btn btn-success waves-effect waves-light">
                                        {{__('Save')}}
                                    </button>

                            </form>
                        </div>
                    </div>
                </section>
                <!-- brand edit ends -->

            </div>
        </div>
    </div>
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

    <script>
        $("#type").select2({
            closeOnSelect : true,
            placeholder : "{{__('Select Discount Type')}}",
            allowHtml: true,
            // allowClear: true,
            // tags: true
        });
        $("#is_except_offers").select2({
            closeOnSelect : true,
            placeholder : "{{__('Select')}}",
            allowHtml: true,
            // allowClear: true,
            // tags: true
        });

    </script>
    {{--edit data Client--}}
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

            $(document).on("click", "#edit_coupon", function() {
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
                    $('#edit_coupon').html('');
                    $('#edit_coupon').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('coupon.update',$coupon->id)}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#edit_coupon').empty();
                            $('#edit_coupon').html('{{__('Save')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    response.success,
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            // document.getElementById("editData").reset();
                            $('.custom-error').remove();

                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#edit_coupon').empty();
                            $('#edit_coupon').html('{{__('Save')}}');
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
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script>

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd',
            minDate:new Date()

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
@endsection

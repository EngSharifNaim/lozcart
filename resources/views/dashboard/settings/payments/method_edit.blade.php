@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <style>
        .modal-slide-in .modal-dialog.sidebar-sm {
            width: 55rem !important;
        }
        .addressPlaceWrap {
            display: flex;
            margin-bottom: 1rem;
        }
        .addressPlaceWrap .placeActived {
            background-color: #233 !important;
            color: #fff;
            border-color: #233 !important;
            box-shadow: none !important;
        }
        #map {
            width: 100% !important;
            height: 250px !important;
            position: relative !important;
            overflow: hidden !important;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Payment Method')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('payment.index')}}">{{__('Payment Methods')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Payment Method')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">

                        <!-- jQuery Validation -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('Edit Payment Method')}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form   enctype="multipart/form-data">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title_ar" class="control-label">
                                                                {{__('The name of the payment method in Arabic')}}
                                                                <span style="color: red">* </span>
                                                            </label>
                                                            <input required="" value="{{$payment_methode->name_ar}}" id="name_ar" type="text" name="name_ar" class="form-control" placeholder="{{__('Example: Bitcoin')}}" aria-required="true">
                                                        </div>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">{{__('The name of the payment method in English')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$payment_methode->name}}" id="name" type="text" name="name" class="form-control" placeholder="Example: Bitcoin" aria-required="true">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="details_ar" class="control-label">
                                                                {{__('Payment method details in Arabic')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <textarea required="" id="details_ar" type="text" name="details_ar" class="form-control" placeholder="{{__('Please send the total order amount to the following Bitcoin wallet: (add your wallet address) and upload a picture of the successful transfer.')}}" aria-required="true">{{$payment_methode->details_ar}}</textarea>
                                                        </div>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="details" class="control-label">
                                                                    {{__('Payment method details in English')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>

                                                                <textarea required="" id="details" type="text" name="details" class="form-control" placeholder=" {{__('Please send the total order amount to the following Bitcoin wallet: (add your wallet address) and upload a picture of the successful transfer.')}}" aria-required="true">{{$payment_methode->details}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endif

                                                      </div>

                                                <button id="editPayment"  type="button" class=" btn btn-success waves-effect waves-light">
                                                    {{__('Save')}}
                                                </button>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /jQuery Validation -->
                    </div>
                </section>
                <!-- /Validation -->


            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->

{{--edit data bank Account--}}
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

            $(document).on("click", "#editPayment", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#editPayment').html('');
                $('#editPayment').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $.ajax({
                        url: "{{ route('payment.payment_update',$payment->id)}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#editPayment').empty();
                            $('#editPayment').html('{{__('Save')}}');
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
                            // document.getElementById("editData").reset();
                            $('.custom-error').remove();

                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#editPayment').empty();
                            $('#editPayment').html('{{__('Save')}}');
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


    {{--    validate is number--}}
    <script>
        function isInputNumber(evt, value) {

            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9.]/.test(ch))) {
                evt.preventDefault();
            }

        }
    </script>
    <script>
        $(document).ready(function() {

            // $form = $('#form_data');

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

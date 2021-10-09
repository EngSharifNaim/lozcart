@extends('dashboard.layouts.app')
@section('style')
    <script type="text/javascript">
        // Notice how this gets configured before we load Font Awesome
        window.FontAwesomeConfig = { autoReplaceSvg: false }
    </script>
    <!-- BEGIN: Vendor CSS-->

    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">

    <style>
        .card .card-title {
            text-align: center;
        }
        .setting-item{
            min-height: 363px !important;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Partner Services')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Partner Services')}}
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
                        <div class="row">
                        @foreach($services as $service)
                            <div class="col-lg-4  col-sm-6" id="item-{{$service->id}}">
                                <div class="card card-body setting-item" style="box-shadow: 0px 2px 6px 0px rgba(198, 198, 198, 0.3);padding:1.5rem;">
                                    <img src="{{asset('photo/png/'.$service->photo)}}" style="margin:0 auto" width="80">
                                    <h4 class="card-title" style="padding:15px 0 0 0"> {{App::isLocale('en')?$service->title:$service->title_ar}} </h4>
                                    <p class="card-text"></p>
                                    <p style="text-align: center; ">
                                        {{App::isLocale('en')?$service->description:$service->description_ar}}
                                    </p>

                                    <div class="text-center" style="margin:20px auto ">
                                        <form action="javascript:void(0)" id="form_services" method="post">
                                            <input type="text"  id="service_id" name="service_id" value="{{$service->id}}" hidden>
                                            <input type="text" id="service" name="service" value="{{App::isLocale('en')?$service->title:$service->title_ar}} " hidden>
                                            <button id="request_service" class="btn btn-success waves-effect waves-light ">
                                                {{__('Request service')}}
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </div>

                    </div> <!-- end col -->
                </div>
                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div id="formRequest" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Please clarify as much as possible of your needs')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" enctype="multipart/form-data"  novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input required name="service_id" type="text" class="form-control" id="service_id" hidden="" >
                                    <input type="text" class="form-control" id="service" disabled >
                                </div>
                                <div class="form-group">
                                    <textarea required name="details" id="details" class="form-control" rows="4" placeholder="{{__('To help us understand your need please carefully describe the service you need')}}" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="add_order" class="btn btn-success waves-effect waves-light">{{__('Send Now')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>


    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    {{--    Add new Country--}}
    @if ($current_plan->plan_id !=4)
    <script>
        $(document).ready(function() {

            $(document).on("click", "#request_service", function() {

                var postData = new FormData(this.form);
                // console.log()
                // $('#request_service').html('');
                {{--$('#request_service').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
                {{--    '<span class="ml-25 align-middle">{{__('Sending...')}}</span>');--}}
                // this.form.empty();
                $('textarea#details').val("")
                $('#formRequest #service').val('{{__('Selected service ')}}'+'( '+postData.get('service')+' )');
                $('#formRequest #service_id').val(+postData.get('service_id'));
                $('#formRequest').modal('show');

            });

        });

    </script>
    @endif
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

            $(document).on("click", "#add_order", function() {
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
                    $('#add_order').html('');
                    $('#add_order').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Sending...')}}</span>');

                    $.ajax({
                        url: "{{ route('partner.order')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#add_order').empty();
                            $('#add_order').html('{{__('Send Now')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    response.message,
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            $('#formRequest').modal('hide');
                        },
                        error: function (data) {
                            $('#add_order').empty();
                            $('#add_order').html('{{__('Send Now')}}');
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
                                    myHandel(response);
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

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
        .custom-domain {
            background: #f7f7f7;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .custom-domain a.btn:last-child {
            margin-left: 0;
        }
        .custom-domain a.btn {
            color: #fff;
            /*background: linear-gradient(to left, rgb(9 109 62) 0%, rgb(9 109 62) 90%);*/
            border-color: #096d3e;
            display: inline-block;
            width: 40%;
            padding: .9rem 1rem;
            margin-left: 20px;
            transition: all 300ms ease-in-out;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Plugins')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Plugins')}}
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
                    <div class="col-md-12">

                        <div class="card">
                            <div>
                                <div class="card-body">
                                    <h3 class=" mb-0">
                                        {{__('Inquire about a custom domain or request to connect your own custom domain')}}
                                    </h3>
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                            <div class="card-body">
                                <div class="custom-domain" style="background:transparent;">
                                    <a href="https://www.name.com/" target="_blank" class="btn btn-success">
                                        <i class="fe-search"></i>
                                        {{__('Find Domain')}}
                                    </a>
                                    @if ($user_domain)
                                        @if ($user_domain->status==0)
                                            <a onclick="swal.fire({
                                                type: 'warning',
                                                title: '{{__('A custom domain request is awaiting acceptance')}}',
                                                timer: 4000
                                                });" href="javascript:void(0)" class="btn btn-warning">
                                                <span class="fa fa-spinner" style="margin-left: 5px"></span>
                                                {{__('Your application is awaiting acceptance. . .')}}
                                            </a>
                                        @endif
                                        @if ($user_domain->status==1)
                                            <a class="btn btn-success" id="connect_domain">
                                                {{__('Your application has been approved')}}
                                            </a>
                                        @endif
                                        @if ($user_domain->status==2)
                                            <a class="btn btn-warning" id="connect_domain">
                                                {{__('Your application has been rejected. Please send another application')}}
                                            </a>
                                        @endif
                                    @endif

                                    @if (!$user_domain)
                                        <a class="btn btn-dark" id="connect_domain">
                                            {{__('I have a custom domain and I want to link')}}
                                        </a>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div id="formRequest" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Request to connect a custom domain')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST"   novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>
                                    {{__('Please link (NameServer) of the LozCart platform in the new domain and then add the domain in the field below')}}
                                </h4>
                                <p>ms1.lozcart.com <br>ms1.lozcart.com</p>

                                <div class="form-group">
                                    <input type="text" value="{{$user_domain->url??''}}" name="url" id="domain" class="form-control" placeholder="name.com" />
                                    <input type="text" value="{{$user_domain->status??'' }}" name="status"  hidden="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="connect" class="btn btn-success waves-effect waves-light">{{__('Connect Now')}}</button>
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
    @if ($current_plan->plan_id!=4)
    <script>
        $(document).ready(function() {

            $(document).on("click", "#connect_domain", function() {


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

            $(document).on("click", "#connect", function() {
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
                    $('#connect').html('');
                    $('#connect').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Connecting...')}}</span>');

                    $.ajax({
                        url: "{{ route('domain.connect')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#connect').empty();
                            $('#connect').html('{{__('Connect Now')}}');
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
                            window.location.href="{{route('domain.index')}}"
                        },
                        error: function (data) {
                            $('#connect').empty();
                            $('#connect').html('{{__('Connect Now')}}');
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

@extends('dashboard.layouts.app')
@section('style')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">

    @if (App::isLocale('en'))
        <style>
            .minOrderInput {
                position: relative;
                margin-top: -1rem;
                max-width: 25%;
                display: inline-block;
                margin-right: 1rem;
            }
            .minOrderInput input {
                width: 100% !important;
                margin: 0 !important;
                padding: 5px 10px !important;
            }
            .minOrderInput span{
                position: absolute;
                top: 16.2%;
                left: 140px;
                color: #6c757d;
            }
        </style>
    @else
        <style>
            .minOrderInput {
                position: relative;
                margin-top: -1rem;
                max-width: 25%;
                display: inline-block;
                margin-right: 1rem;
            }
            .minOrderInput input {
                width: 100% !important;
                margin: 0 !important;
                padding: 5px 10px !important;
            }
            .minOrderInput span{
                position: absolute;
                top: 16.2%;
                right: 140px;
                color: #6c757d;
            }
        </style>
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
                            <h2 class="content-header-title float-left mb-0">{{__('Additional settings')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Additional settings')}}
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
                                    <h4 class="card-title">{{__('Additional store options')}}</h4>
                                </div>
                                <div class="card-body">

                                        <div class="col-md-12">
                                            <form id="editData">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <div class="checkbox checkbox-primary form-check-block mb-3">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="show_copyrights"{{$market->additional_setting->show_copyrights ==1?'checked':''}} class="custom-control-input" id="show_copyrights">
                                                                <label class="custom-control-label" for="show_copyrights">
                                                                    {{__('Show the copyright of the LozCart platform in your store')}}
                                                                </label>
                                                                <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top"
                                                                      title="{{__('When you activate this option, this phrase appears in your store (Made with every ❤︎ by the LozCart platform)')}}" style="border-radius: 25px;">
                                                                    <i data-feather='alert-circle' ></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="checkbox checkbox-primary form-check-block mb-3">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="is_min_order_amount" {{$market->additional_setting->is_min_order_amount ==1?'checked':''}} class="custom-control-input is_min_order_amount" id="show_copyrights2">
                                                                <label class="custom-control-label" for="show_copyrights2">
                                                                    {{__('Activate the minimum order')}}
                                                                </label>
                                                                <div class="minOrderInput">
                                                                    <input onchange="handleMinChange(this);" value="{{$market->additional_setting->min_order_amount}}" name="min_order_amount" type="text" id="min_order_amount" style="margin:0 20px ;border:1px solid #ced4da;width:100px;border-radius:3px;padding:5px" disabled="disabled">
                                                                    <span >{{App::isLocale('en')?$country_store->country->currency_short:$country_store->country->currency_short_ar}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button id="edit_additional"  type="button" class=" btn btn-success waves-effect waves-light">
                                                            {{__('Save')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form id="updateLanguage">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>
                                                        {{__('Languages')}}
                                                    </h4>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="checkbox checkbox-primary form-check-block mb-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled="" checked="" class="custom-control-input" id="support_arabic">
                                                            <label class="custom-control-label" for="support_arabic">
                                                                اللغة العربية
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox checkbox-primary form-check-block mb-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="support_english" {{in_array('en',$language)?'checked':''}}  class="custom-control-input" id="support_english">
                                                            <label class="custom-control-label" for="support_english">
                                                                English
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button id="update_language"  type="button" class=" btn btn-success waves-effect waves-light">
                                                        {{__('Save')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form id="updateMaintenance">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                        {{__('Maintenance shop mode')}}
                                                    </h4>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="checkbox checkbox-primary form-check-block mb-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="is_active" {{$market->additional_setting->is_active ==1?'checked':''}} class="custom-control-input is_active" id="show_copyrights3">
                                                            <label class="custom-control-label" for="show_copyrights3">
                                                                {{__('Temporarily stop the store to do maintenance')}}
                                                            </label>
                                                            @if ($market->additional_setting->is_active ==0)
                                                            <div id="deactivate_message">
                                                            </div>
                                                            @endif
                                                            @if ($market->additional_setting->is_active ==1)
                                                                <div id="deactivate_message">
                                                                    <hr>
                                                                    <h5 style="margin:0 3px">{{__('Maintenance message:')}}
                                                                    </h5>
                                                                    <div class="input-group mb-2" style="padding: 15px 0 ">
                                                                        <textarea maxlength="200" id="updated_store_status_message" rows="3" class="form-control" placeholder="{{__('Default text')}}">{{$market->additional_setting->text_404}}</textarea>

                                                                    </div>
                                                                    <button id="updateDeactivateMessage" style="float: left" class="btn btn-success waves-effect waves-light">
                                                                        <span class="fa fa-edit"></span>
                                                                        {{__('Message update')}}
                                                                    </button>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
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
    <div class="modal fade" id="store_maintenance_message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header" >
                        <h4 class="modal-title " style="color:#ffffff;" >{{__('Temporarily stop the store to do maintenance')}}</h4>
                        <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                    </div>
                    <div class="text-center" style="padding:10px">
                        <img src="{{asset('photo/Maintenance.png')}}" width="150">
                        <h5>{{__('This message appears to the customer while activating the maintenance option')}} </h5>
                    </div>

                    <div class="modal-body p-2">
                        <h4 style="margin:0 3px">{{__('Maintenance message:')}}</h4>
                        <div class="input-group mb-2" style="padding: 15px 0 ">
                            <textarea name="message" maxlength="200" id="store_status_message" rows="3" class="form-control" placeholder="{{__('Default text')}}">{{$market->additional_setting->text_404 ??__('Dear customer, We apologize. The store is now under maintenance')}} </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="store_maintenance_message_btn" type="button" class="btn btn-success waves-effect waves-light" data-dismiss="modal" aria-hidden="true">
                            {{__('Save')}}
                        </button>
                    </div>
                </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->
    @if ($current_plan->plan_id!=4)
{{--edit data Profile--}}
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

            $(document).on("click", "#update_language", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#update_language').html('');
                $('#update_language').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('additional_setting.language',$market->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#update_language').empty();
                        $('#update_language').html('{{__('Save')}}');
                        // Toast.fire({
                        //     type: 'success',
                        //     title: response.success
                        // });
                        setTimeout(function () {
                            toastr['success'](
                                @if(App::isLocale('en'))
                                    response.message_en,
                                @else
                                    response.message_ar,
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
                        $('#update_language').empty();
                        $('#update_language').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        @if(App::isLocale('en'))
                                            response.message_en,
                                        @else
                                            response.message_ar,
                                            @endif
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
            });

        });

    </script>
    @endif
{{--edit data Profile--}}
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

            $(document).on("click", "#edit_additional", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#edit_additional').html('');
                $('#edit_additional').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('additional_setting.store.update',$market->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#edit_additional').empty();
                        $('#edit_additional').html('{{__('Save')}}');
                        // Toast.fire({
                        //     type: 'success',
                        //     title: response.success
                        // });
                        setTimeout(function () {
                            toastr['success'](
                                @if(App::isLocale('en'))
                                    response.message_en,
                                @else
                                    response.message_ar,
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
                        $('#edit_additional').empty();
                        $('#edit_additional').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                myHandel(response);
                                setTimeout(function () {
                                    toastr['error'](
                                        @if(App::isLocale('en'))
                                            response.message_en,
                                        @else
                                            response.message_ar,
                                            @endif
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
            });

        });

    </script>


    <script !src="">
        function handleMinChange(input) {
            let val = $(input).val();
            if (val !== "") {
                if (input.value < 1) input.value = 1;
            }
        }

        //check if is offer checked
        let is_min_order_amount = $('.is_min_order_amount');
        let min_order_amount_input = $('#min_order_amount');
        if (is_min_order_amount.prop('checked') === true) {
            min_order_amount_input.removeAttr('disabled', true);
            min_order_amount_input.attr('required', true);
            min_order_amount_input.attr('min', 1);
        } else {
            min_order_amount_input.attr('disabled', true);
            min_order_amount_input.removeAttr('required');
            min_order_amount_input.removeAttr('min', true);
        }
        is_min_order_amount.change(function () {
            if (is_min_order_amount.prop('checked') === true) {
                min_order_amount_input.removeAttr('disabled', true);
                min_order_amount_input.attr('required', true);
                min_order_amount_input.attr('min', 1);
                min_order_amount_input.val(1);
            } else {
                min_order_amount_input.attr('disabled', true);
                min_order_amount_input.removeAttr('required');
                min_order_amount_input.removeAttr('min', true);
            }
        });

        $('#store_maintenance_message_btn').click(function (e) {
            e.preventDefault();
            let message = $('#store_status_message').val();
            //send request to deactivated store
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $.ajax({
                type: "POST",
                url: "{{route('additional_setting.enable_maintenance_mode')}}",
                data: {'message': message},
                success: function (data) {
                    if (data.status === 0) {
                        swal.fire({
                            type: 'error',
                            icon: 'warning',
                            @if(App::isLocale('en'))
                            title: data.message_en,
                            @else
                            title: data.message_ar,
                            @endif
                            timer: 4000
                        });
                    } else {
                        $('#show_copyrights3').prop('checked', true);
                        $('#deactivate_message').fadeIn(500);
                        $('#deactivate_message').html('<hr>\n' +
                            '                                        <h5 style="margin:0 3px">{{__('Maintenance message:')}}\n' +
                            '                                        </h5>\n' +
                            '                                        <div class="input-group mb-2" style="padding: 15px 0 ">\n' +
                            '                                             <textarea maxlength="200" id="updated_store_status_message" rows="3"\n' +
                            '                                                       class="form-control"\n' +
                            '                                                       placeholder="{{__('Default text')}}">' + message + '</textarea>\n' +
                            '\n' +
                            '                                        </div>\n' +
                            '                                        <button  id="updateDeactivateMessage" style="float: left"\n' +
                            '                                                class="btn btn-success waves-effect waves-light"><span\n' +
                            '                                                class="fa fa-edit"></span> {{__('Message update')}}\n' +
                            '                                        </button>');
                        swal.fire({
                            type: 'success',
                            icon: 'success',
                            @if(App::isLocale('en'))
                            title: data.message_en,
                            @else
                            title: data.message_ar,
                            @endif
                            timer: 2000
                        });
                    }
                },
                error: function (data) {
                    swal.fire({
                        type: 'error',
                        title: 'عذراً، حدثت خلل أثناء عملية الإرسال',
                        timer: 4000
                    });
                },
                complete: function () {
                    //$('.orderLoader').fadeOut(200);
                }
            });
            //swal success message to activate or failed

        });
        $('#updateDeactivateMessage').click(function (e) {
            e.preventDefault();
        // function updateDeactivateMessage() {
            let message = $('#updated_store_status_message').val();

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            $.ajax({
                type: "POST",
                url: "{{route('additional_setting.update_deactivate_message')}}",
                data: {'message': message},
                success: function (data) {
                    if (data.status === 0) {
                        swal.fire({
                            type: 'error',
                            icon: 'warning',
                            @if(App::isLocale('en'))
                            title: data.message_en,
                            @else
                            title: data.message_ar,
                            @endif
                            timer: 4000
                        });
                    } else {
                        swal.fire({
                            type: 'success',
                            icon: 'success',
                            @if(App::isLocale('en'))
                            title: data.message_en,
                            @else
                            title: data.message_ar,
                            @endif
                            timer: 2000
                        });
                    }
                },
                error: function (data) {
                    alert(data.responseText);

                },
                complete: function () {
                    //$('.orderLoader').fadeOut(200);
                }
            });
        });
        @if ($current_plan->plan_id!=4)
        $('#show_copyrights3').click(function (e) {
            e.preventDefault();

            if ($(this).prop('checked') === false) {

                //send ajax request to activate store
                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });
                swal.fire({
                    title: "{{__('Are you sure about the process of reactivating your store?!')}}",
                    type: "error",
                    cancelButtonColor: '#d33',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: true,
                    cancelButtonText: '{{__('Cancel')}}',
                    confirmButtonText: "{{__('Confirm !')}}",
                    showCancelButton: true
                }).then(function (e) {
                    if (e.value === true) {
                        $.ajax({
                            type: "POST",
                            url: "{{route('additional_setting.enable_active_mode')}}",
                            success: function (data) {
                                if (data.status === 0) {
                                    swal.fire({
                                        type: 'error',
                                        icon: 'warning',
                                        @if(App::isLocale('en'))
                                        title: data.message_en,
                                        @else
                                        title: data.message_ar,
                                        @endif
                                        timer: 4000
                                    });
                                } else {
                                    $('#show_copyrights3').prop('checked', false);
                                    $('#deactivate_message').fadeOut(500);
                                    $('#deactivate_message').html('');
                                    swal.fire({
                                        type: 'success',
                                        icon: 'success',
                                        @if(App::isLocale('en'))
                                        title: data.message_en,
                                        @else
                                        title: data.message_ar,
                                        @endif
                                        timer: 2000
                                    });
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);

                            },
                            complete: function () {
                                //$('.orderLoader').fadeOut(200);
                            }
                        });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })


                //swal success message to activate or failed
            } else {
                $('#store_maintenance_message_modal').modal();
            }

        });
        @endif
    </script>
@endsection

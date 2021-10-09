@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    @if (App::isLocale('en'))
        <style>
            .pu_right .custom-checkbox .custom-control-label::before,
            .pu_right .custom-checkbox .custom-control-label::after{
                left: 5px;
                top: 0.67rem;
            }
            .all{
                position: relative;
                top:0px;
                left:0px;
                background: linear-gradient(to left, rgb(40 199 111) 0%, rgb(41 198 113) 90%);
                padding:10px 40px;
                color: #fff;
                border-radius:4px;
                white-space: nowrap;
            }
        </style>
    @else
        <style>
            .pu_right .custom-checkbox .custom-control-label::before,
            .pu_right .custom-checkbox .custom-control-label::after{
                right: 5px;
                top: 0.67rem;
            }
            .all{
                position: relative;
                top:0px;
                right:0px;
                background: linear-gradient(to left, rgb(40 199 111) 0%, rgb(41 198 113) 90%);
                padding:10px 40px;
                color: #fff;
                border-radius:4px;
                white-space: nowrap;
            }
        </style>
    @endif
    <style>
        .all label{
            color: #ffffff;
        }

        .tap-select::-webkit-scrollbar {
            width: 6px;
        }

        .tap-select::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 3px rgb(9 109 62 / 52%);
            border-radius: 10px;
        }

        .tap-select::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 3px rgb(9 109 62);
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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Employe')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('staff.index')}}">{{__('Staff')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Employe')}}
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
                                    <h4 class="card-title">{{__('Edit Employe')}}</h4>
                                </div>
                                <div class="card-body">
                                    <form id="form" novalidate method="post" action="javascript:void(0)">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="basic-default-name">{{__('Name')}}</label>
                                                <input type="text" value="{{$market->owner_name}}" class="form-control" id="name" name="name" placeholder="{{__('Name')}}" />
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="basic-default-name">{{__('Email')}}</label>
                                                <input type="email" value="{{$market->email}}" class="form-control" id="email" name="email" placeholder="{{__('Email')}}" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="select-country1">{{__('Role')}}</label>
                                                <select class="form-control" id="role_id" name="role_id" >
                                                    <option value="">{{__('Select Role')}}</option>
                                                    <option value="ADD_NEW_PERMISSION">{{__('New Role')}}</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}"{{$role->id==$userRole?'selected':''}}>
                                                            @if(App::isLocale('en'))
                                                                {{$role->name}}
                                                            @else
                                                                {{$role->ar_name}}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-row col-md-12" id="permession_role_name" style="display: none;"></div>
                                        </div>
                                        <div class="clearfix">
                                            <div class="pu_right">
                                                <h3 class="header-title mb-3 mt-3" style="font-size:20px"> {{__('Permissions')}} </h3>
                                            </div>

                                            <div class="pu_right">
                                                <div class="custom-control custom-checkbox mb-1 col-md-2 all">
                                                    <input type="checkbox" class="custom-control-input" id="SelectAll" name="example1">
                                                    <label class="custom-control-label" id="selectAllLabel" for="SelectAll">{{__('Select All')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-4 ">
                                                    <div class="tab-pane  show active" id="home1">
                                                        <div class="tap-select overflow-auto" style="border: 1px solid #eee;padding: 10px; box-shadow: 0px 2px 10px 0px rgba(198, 198, 198, 0.3);height:272px">
                                                            <div class="col-md-12 ">
                                                                <div class="custom-control custom-checkbox mb-3" style="margin:5px  0">
                                                                    <input type="checkbox" {{in_array($permission->id,$rolePermissions )?'checked':''}} class="custom-control-input choose_Check choose_BCheck" id="customCheckButton{{$permission->id}}"
                                                                           data-parent="0" data-place="cb{{$permission->id}}" name="basicPermissions[]" value="{{$permission->id}}">
                                                                    <label class="custom-control-label" for="customCheckButton{{$permission->id}}">
                                                                        <a style="font-size:20px;color: #333;position: relative;top:-2px;font-weight: bold;">
                                                                            @if(App::isLocale('en'))
                                                                                {{$permission->name}}
                                                                            @else
                                                                                {{$permission->ar_name}}
                                                                            @endif
                                                                        </a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            @foreach($permission->children as $child)
                                                                <div class="col-md-12 ">
                                                                    <div class="custom-control custom-checkbox mb-3">
                                                                        <input type="checkbox" {{in_array($child->id,$rolePermissions )?'checked':''}} class="custom-control-input choose_Check cb{{$permission->id}}" data-parent="customCheckButton{{$permission->id}}"
                                                                               id="customCheck{{$child->id}}"
                                                                               value="{{$child->id}}" name="permissions[]">
                                                                        <label class="custom-control-label" for="customCheck{{$child->id}}">
                                                                            @if(App::isLocale('en'))
                                                                                {{$child->name}}
                                                                            @else
                                                                                {{$child->ar_name}}
                                                                            @endif
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>

                                                    </div>
                                                    <br>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-success " id="update_data" name="submit" value="Submit" >
                                                    {{__('Save')}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /jQuery Validation -->
                    </div>
                    <div class="row">

                        <!-- jQuery Validation -->
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        {{__('Password Update')}}
                                        <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top"
                                              title="{{__('At least 6 characters long')}}" style="border-radius: 25px;">
                                                            <i data-feather='alert-circle' ></i>
                                        </span>
                                        <span style="color: red">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form id="updatePassword">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="password" class="control-label">{{__('Password')}}
                                                        <span style="color: red">*</span>
                                                    </label>
                                                    <input type="password" name="password" class="form-control" value="" placeholder="{{__('New Password')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label  id="password" for="password" class="control-label">{{__('Password confirmation')}}
                                                        <span style="color: red">*</span>
                                                    </label>
                                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" value="" placeholder="{{__('Password confirmation')}}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button id="update_password" type="button" class=" btn btn-success waves-effect waves-light">
                                                        {{__('Password Update')}}
                                                    </button>
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
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/custom/staff-validation.js')}}"></script>
    <!-- END: Page JS-->


    <script>
        $('#update_data').click(function () {

            $('#form').validate({
                errorElement: "div",
                errorClass: 'error',
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },

                    role_id: {
                        required: true,
                    },

                },
                // messages: {
                //     name: {
                //         required: 'هذا الحقل مطلوب',
                //     },
                //     email: {
                //         required: 'هذا الحقل مطلوب',
                //         email: 'ادخل الايميل بصيغه صحيحه',
                //     },
                //     password: {
                //         required: 'هذا الحقل مطلوب',
                //         minlength: 'يجب أن يكون على الاقل من 6 احرف',
                //     },
                //     role_id: {
                //         required: 'يجب اختيار صلاحية او اضافه صلاحية جديدة',
                //     },
                //     permissions_name: {
                //         required: 'هذا الحقل مطلوب',
                //     },
                //     permissions_name_ar: {
                //         required: 'هذا الحقل مطلوب',
                //     },
                // } ,

            });

            if ($('#form').valid()) {
                var has_permissions =false;
                $('.choose_Check').each(function (i) {
                    if ($(this).is(':checked')) {
                        has_permissions=true;
                    }
                });
                if(has_permissions){

                    $('#form').submit();
                }else{
                    $('#SelectAll').parent().parent().after('<div id="permissions-error" class="abs_error help-block has-error">يجب تحديد صلاحية واحده على الاقل</div>');
                }
            }
        });
        $(document).on("click", "#update_data", function() {
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
                $('#update_data').html('');
                $('#update_data').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('staff.update',$market->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#update_data').empty();
                        $('#update_data').html('{{__('Save')}}');
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
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#update_data').empty();
                        $('#update_data').html('{{__('Save')}}');
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
                                }, 2000);
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
        $(document).ready(function () {

            if ($('#role_id').val() === 'ADD_NEW_PERMISSION') {
                $('#permession_role_name').append(' <div class="form-group col-md-6">' +
                    '                                      <label class="form-label" for="permissions_name">{{__('Role Name En')}}</label>' +
                    '                                       <input type="text" required class="form-control" id="permissions_name' +
                    '                                        value="'+''+'" name="permissions_name">' +
                    '                                  </div>'+
                    '                                  <div class="form-group col-md-6">' +
                    '                                      <label class="form-label" for="permissions_name_ar">{{__('Role Name Ar')}}</label>' +
                    '                                       <input type="text" required class="form-control" id="permissions_name_ar' +
                    '                                        value="'+''+'" name="permissions_name_ar">' +
                    '                                  </div>');

                $('#permession_role_name').fadeIn(200);
            } else {
                $('#permession_role_name').fadeOut(200);
                $('#permession_role_name').empty();

            }

            $('#role_id').change(function () {
                $('#SelectAll').prop("checked", false);
                $('.choose_Check').each(function (i) {
                    $(this).prop("checked", false);
                });
                if ($(this).val() === 'ADD_NEW_PERMISSION') {
                    $('#permession_role_name').append(' <div class="form-group col-md-6">' +
                        '                                      <label class="form-label" for="permissions_name">{{__('Role Name En')}}</label>' +
                        '                                       <input type="text" required class="form-control" id="permissions_name' +
                        '                                        value="'+''+'" name="permissions_name">' +
                        '                                  </div>'+
                        '                                  <div class="form-group col-md-6">' +
                        '                                      <label class="form-label" for="permissions_name_ar">{{__('Role Name Ar')}}</label>' +
                        '                                       <input type="text" required class="form-control" id="permissions_name_ar' +
                        '                                        value="'+''+'" name="permissions_name_ar">' +
                        '                                  </div>').fadeIn(200);

                    {{--$('#permession_role_name').append('<div class="form-group">' +--}}
                    {{--    '                                      <label class="form-label" for="permissions_name">{{__('Name Role')}}</label>' +--}}
                    {{--    '                                       <input type="text" required class="form-control" id="permissions_name"' +--}}
                    {{--    '                                        value="'+''+'" name="permissions_name">' +--}}
                    {{--    '                                  </div>').fadeIn(200);--}}
                    // $('.choose_Check').each(function (i) {
                    //     $(this).removeAttr("disabled");
                    // });
                    // $('#SelectAll').removeAttr("disabled");

                } else {
                    var role_id=$(this).val();
                    var all_checked=true;
                    $.ajax({
                        url: '{{route('staff.get_permission')}}',
                        data: {id:role_id},
                        method: 'GET',
                        success: function(result){
                            console.log(result.role_has_permissions)
                            if(result.role_has_permissions.length > 0){
                                $(result.role_has_permissions).each(function (index,value) {
                                    $('#customCheckButton'+value['permission_id']).prop('checked',true);
                                    // console.log(value['id']);
                                    $('#customCheck'+value['permission_id']).prop("checked", true);
                                });
                            }
                            $('.choose_Check').each(function (i) {
                                if (!$(this).is(':checked')) {
                                    all_checked=false;
                                }
                            });
                            if(all_checked == true){
                                $('#SelectAll').prop("checked", true);

                            }else{
                                $('#SelectAll').prop("checked", false);

                            }
                        },
                        error:function(){
                            swal({
                                type:'error',
                                title:'خطأ',
                                timer:200
                            })
                        }

                    });
                    /* $('.choose_Check').each(function (i) {
                         $(this).attr("disabled", true);
                     });
                     $('#SelectAll').attr("disabled", true);
 */

                    $('#permession_role_name').fadeOut(200).empty();


                }
            });
            $('#SelectAll').on('click', function () {
                if ($(this).is(':checked')) {
                    $('.choose_Check').each(function (i) {
                        $(this).prop("checked", true);
                    });
                } else {
                    $('.choose_Check').each(function (i) {
                        $(this).prop("checked", false);
                    });
                }

            });
            $('.choose_Check').change(function(){
                $('#permissions-error').remove();
            });
            $('.choose_BCheck').on('click', function () {
                var id='.'+$(this).data('place');
                console.log(id);
                if ($(this).is(':checked')) {
                    $(id).each(function (i) {
                        $(this).prop("checked", true);
                    });
                } else {
                    $(id).each(function (i) {
                        $(this).prop("checked", false);
                    });
                }

            });
            $('.choose_Check').click(function () {
                var parent =$(this).data('parent');
                var parent_id='.'+$('#'+parent).data('place');
                var others_checked = false;
                var all_checked = true;
                if(parent != 0){
                    if ($(this).is(':checked')) {
                        $('#'+parent).prop("checked", true);
                        $('.choose_Check').each(function (i) {
                            if (!$(this).is(':checked')) {
                                all_checked=false;
                            }
                        });
                        if(all_checked == true){
                            $('#SelectAll').prop("checked", true);

                        }else{
                            $('#SelectAll').prop("checked", false);

                        }
                    } else {
                        $(parent_id).each(function (i) {
                            if ($(this).is(':checked')) {
                                others_checked=true;
                            }
                        });
                        if(others_checked){
                            $('#'+parent).prop("checked", true);
                        }else{
                            $('#'+parent).prop("checked", false);

                        }
                        $('#SelectAll').prop("checked", false);
                    }
                }

            })
        });
    </script>
    {{--    update password--}}
    <script>
        $(document).ready(function() {
            $('#updatePassword').validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 9
                    },
                    'password_confirmation': {
                        required: true,
                        equalTo: '#password'
                    },

                },
                // messages: {
                //     name: {
                //         required: 'هذا الحقل مطلوب',
                //     },
                //     email: {
                //         required: 'هذا الحقل مطلوب',
                //         email: 'ادخل الايميل بصيغه صحيحه',
                //     },
                //     password: {
                //         required: 'هذا الحقل مطلوب',
                //         minlength: 'يجب أن يكون على الاقل من 6 احرف',
                //     },
                //     role_id: {
                //         required: 'يجب اختيار صلاحية او اضافه صلاحية جديدة',
                //     },
                //     permissions_name: {
                //         required: 'هذا الحقل مطلوب',
                //     },
                //     permissions_name_ar: {
                //         required: 'هذا الحقل مطلوب',
                //     },
                // } ,

            });
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

            $(document).on("click", "#update_password", function() {
                var $form1 = $(this.form);
                if(! $form1.valid()) {
                    return false
                };
                if ($form1.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#update_password').html('');
                    $('#update_password').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Updating')}}...</span>');
                    $.ajax({
                        url: "{{ route('staff.update_password',$market->id)}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#update_password').empty();
                            $('#update_password').html('{{__('Update Password')}}');
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
                            document.getElementById("updatePassword").reset();
                            $('.custom-error').remove();

                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#update_password').empty();
                            $('#update_password').html('{{__('Update Password')}}');
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

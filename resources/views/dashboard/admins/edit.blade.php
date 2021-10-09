@extends('dashboard.layouts.app')
@section('style')
    <style>
        .select2-container {
            width:100% !important;
        }
        .select2-container .select2-selection--single {
            height: 80% !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px !important;
            top: 23px !important;
            width: 30px !important;
        }
    </style>
    <link href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />


@endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    @if($type=='["Administration Employee"]')
                        {{__('Administration Employee Page')}}
                    @endif
                    @if($type=='Admin')
                        {{__('Admins Page')}}
                    @endif
                    @if($type=='User')
                        {{__('User Page')}}
                    @endif
                    @if($type=='["Cooker"]')
                        {{__('Cooker Page')}}
                    @endif
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('user.index',[$type,$status])}}" class="kt-subheader__breadcrumbs-link">
                        @if($type=='["Administration Employee"]')
                            {{__('Administration Employee Page')}}
                        @endif
                        @if($type=='Admin')
                            {{__('Admins Page')}}
                        @endif
                        @if($type=='User')
                            {{__('User Page')}}
                        @endif
                        @if($type=='["Cooker"]')
                            {{__('Cooker Page')}}
                        @endif
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('user.edit',[$type,$status,$user->id])}}" class="kt-subheader__breadcrumbs-link">
                        @if($type=='["Administration Employee"]')
                            {{__('Administration Employee Edit')}}
                        @endif
                        @if($type=='Admin')
                            {{__('Admin Edit')}}
                        @endif
                        @if($type=='User')
                            {{__('User Edit')}}
                        @endif
                        @if($type=='["Cooker"]')
                            {{__('Cooker Edit')}}
                        @endif
                    </a>


                </div>

                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
										<span><i class="flaticon2-search-1"></i></span>
									</span>
                </div>
            </div>
        </div>

        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    @if($type=='["Administration Employee"]')
                                        {{__('Administration Employee Edit')}}
                                    @endif
                                    @if($type=='Admin')
                                        {{__('Admin Edit')}}
                                    @endif
                                    @if($type=='User')
                                        {{__('User Edit')}}
                                    @endif
                                    @if($type=='["Cooker"]')
                                        {{__('Cooker Edit')}}
                                    @endif
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form" id="mainEdit" method="post" action="javascript:void(0)" >
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group">
                                    <label>{{__('Name')}}</label>
                                    <input type="text" class="form-control"  name="name" value="{{$user->name?? old('name') }}" placeholder="{{__('Enter')}} {{__('Name')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Email')}}</label>
                                    <input type="email" class="form-control" name="email" value="{{$user->email?? old('email') }}" placeholder="{{__('Enter')}} {{__('Email')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Mobile')}}</label>
                                    <input type="text" class="form-control" name="mobile" value="{{$user->mobile?? old('mobile') }}" placeholder="{{__('Enter')}} {{__('Mobile')}}">
                                </div>
{{--                                <input type="text" name="type" value="{{$type}}"  hidden="" >--}}
                                <input type="text" id="user_id" name="user_id" value="{{$user->id}}"  disabled  hidden="">
                                <div class="form-group">
                                    <span class="kt-switch kt-switch--icon">
                                        <label>
                                        <input type="checkbox" name="status" id="status-{{$user->id}}" onchange="cahngeStatus({{$user->id}})" value="{{$user->status}}" {{ ($user->status == 1)? 'checked="checked"' : "" }}>
                                        <span></span>
                                    </label>
                                    </span>

                                </div>
                                <div class="form-group ">
                                    <label>{{__('Role')}}</label>

                                        <select class="form-control kt-select2" id="kt_select2_1"  name="roles_name[]"  >
                                            @foreach($roles as $role)
                                                <option value="{{$role}}"{{ in_array($role, $userRole)? "selected" : "" }}>{{$role}}</option>
                                            @endforeach
                                        </select>

                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions text-center">
                                    <button id="edit_form"   type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>

                </div>

            </div>
        </div>

        <!-- end:: Content -->
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Update Data
            const Toast = Swal.mixin({
                icon: 'success',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
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

            $(document).on("click", "#edit_form", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                var id =$('#user_id').val()
                // var files = $('#file')[0].files[0];
                // postData.append('image',files)
                $('#add_form').html('{{__('Editing...')}}');
                $.ajax({
                url: "{{ url("dashboard/users/update")}}" + '/' + id,
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_form').html('{{__('Edit')}}');
                        Toast.fire({
                            type: 'success',
                            title: response.success
                        });
                        // document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();
                        // $('#blah').removeAttr('src');

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                myHandel(response);
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message
                                });
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
    <script type="text/javascript">

        // ev.allowSubmit = true;
        function cahngeStatus(id) {
            // Update Data
            const Toast = Swal.mixin({
                icon: 'success',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

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
            var idRow = document.getElementById("user_row_" + id)

            $.ajax({
                url: "{{ url("dashboard/status_user/")}}" + '/' + id,
                type: "POST",
                data: {
                    status: status_new,
                    _token: token,

                },
                success: function (response) {
                    Toast.fire({
                        type: 'success',
                        title: response.success
                    });
                    if (status_new == 1) {
                        $("#status-"+id).val('1');
                    }
                    if (status_new== 0) {
                        $("#status-"+id).val('0');
                    }

                    idRow.remove();

                },
                error: function (data) {
                    var response = data.responseJSON;
                    if (data.status == 422) {
                        if (typeof (response.responseJSON) != "undefined") {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
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
    </script>
    <script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $(".kt-select2").select2({
                placeholder: "Select a Role",
                // allowClear: true
            });
        } );

    </script>
@endsection

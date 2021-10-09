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
    <link href="{{asset('assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    @if($status==1)
                        {{__('Centers Active Page ') }}
                    @endif
                    @if($status==2)
                        {{__('Centers Pending Page ') }}
                    @endif
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.centers.index',$status)}}" class="kt-subheader__breadcrumbs-link">
                        @if($status==1)
                            {{__('Centers Active Page ') }}
                        @endif
                        @if($status==2)
                            {{__('Centers Pending Page ') }}
                        @endif
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.centers.edit',[$status,$user->id])}}" class="kt-subheader__breadcrumbs-link">
                        {{__('Edit Centers') }}
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
                                    {{__('Edit Centers') }}
                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form" id="mainEdit" method="post" action="javascript:void(0)" >
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group">
                                    <label>{{__('Owner Name')}}</label>
                                    <input type="text" class="form-control"  name="owner_name" value="{{$user->owner_name }}"  placeholder="{{__('Enter')}} {{__('Owner Name')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Name')}}</label>
                                    <input type="text" class="form-control"  name="name" value="{{$user->name}}" placeholder="{{__('Enter')}} {{__('Name')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Email')}}</label>
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="{{__('Enter')}} {{__('Email')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Mobile')}}</label>
                                    <input type="text" class="form-control" name="mobile" value="{{$user->mobile }}" placeholder="{{__('Enter')}} {{__('Mobile')}}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2 col-sm-12">{{__('Open Time')}}</label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <div class="input-group timepicker">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-clock-o"></i>
                                                    </span>
                                            </div>
                                            <input class="form-control"  name="open_time" id="kt_timepicker_2"value="{{$user->open_time}}" readonly placeholder="Select time" type="text" />
                                        </div>
                                    </div>
                                    <label class="col-form-label col-lg-2 col-sm-12">{{__('Close Time')}}</label>
                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                        <div class="input-group timepicker">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-clock-o"></i>
                                                    </span>
                                            </div>
                                            <input class="form-control" name="close_time" id="kt_timepicker_2"value="{{$user->close_time}}" readonly placeholder="Select time" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>{{__('Work Days')}}</label>
                                    <select class="form-control kt-select2" id="kt_select2_3"  name="work_days[]" multiple="multiple"  >
                                    @if ($days)
                                            <option value="Sat" {{ in_array('Sat', $days)? "selected" : "" }}>{{__('Saturday')}}</option>
                                            <option value="Sun"{{ in_array('Sun', $days)? "selected" : "" }}>{{__('Sunday')}}</option>
                                            <option value="Mon"{{ in_array('Mon', $days)? "selected" : "" }}>{{__('Monday')}}</option>
                                            <option value="Tue"{{ in_array('Tues', $days)? "selected" : "" }}>{{__('Tuesday')}}</option>
                                            <option value="Wed"{{ in_array('Wed', $days)? "selected" : "" }}>{{__('Wednesday')}}</option>
                                            <option value="Thu"{{ in_array('Thurs', $days)? "selected" : "" }}>{{__('Thursday')}}</option>
                                            <option value="Fri"{{ in_array('Fri', $days)? "selected" : "" }}>{{__('Friday')}}</option>

                                        @endif
                                    </select>
                                </div>
{{--                                <input type="text" name="type" value="{{$type}}"  hidden="" >--}}
                                <input type="text" id="user_id" name="user_id" value="{{$user->id}}"  disabled  hidden="">
                                <div class="form-group ">
                                    <label>{{__('Category')}}</label>
                                    <select class="form-control kt-select2" id="kt_select2_1"  name="category_id"  >
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}" {{ $item->id ==$user->category_id?'selected':'' }}>{{$item->title}}</option>
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
                url: "{{ url("admin/centers/update")}}" + '/' + id,
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
                url: "{{ url("admin/status_user/")}}" + '/' + id,
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
    <script src="{{asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/bootstrap-timepicker.js')}}" type="text/javascript"></script>

    <script>
        $(document).ready( function () {
            $(".kt-select2").select2({
                placeholder: "Select Work Days",
            });
        } );

    </script>
@endsection

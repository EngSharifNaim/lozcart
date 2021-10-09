@extends('dashboard.layouts.app')
@section('style')
    <style>
        .select2-container {
            width:100% !important;
        }
    </style>
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
{{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">--}}
    <link href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />


@endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('Admins Page')}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.administration.index',$status)}}" class="kt-subheader__breadcrumbs-link">
                        {{__('Admins Page')}}
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

            <!--Begin::Dashboard 1-->

            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                        <h3 class="kt-portlet__head-title">
                                {{__('Admins Page')}}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{route('admin.administration.create',$status)}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                    <i class="la la-plus"></i>
                                        {{__('New Admin')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                                    <table class="table  table-bordered table-hover  " id="table_1">
                                        <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Mobile')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Status')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr id="user_row_{{$user->id}}">
                                                <td>
                                                    @if(App::isLocale('en'))
                                                        {{$user->name}}
                                                    @else
                                                        {{$user->name}}
                                                    @endif
                                                </td>
                                                <td>{{$user->mobile}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                <span class="kt-switch kt-switch--icon">
                                                    <label>
                                                        <input type="checkbox" name="status" id="status-{{$user->id}}" onchange="cahngeStatus({{$user->id}})" value="{{$user->status}}" {{ ($user->status == 1)? 'checked="checked"' : "" }}>
                                                        <span></span>
                                                    </label>
                                                </span>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('admin.administration.edit',[$status,$user->id])}}">
                                                        <i class="flaticon-settings-1"></i>
                                                    </a>
                                                    <button id="delete" onclick="deleteConfirmation({{$user->id}})" class="btn btn-danger">
                                                        <i class="flaticon-delete"></i>
                                                    </button>
                                                </td>

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>

    <!--end: Datatable -->
                </div>
            </div>

            <!--End::Dashboard 1-->
        </div>

        <!-- end:: Content -->
    </div>
@endsection
@section('scripts')
    <!--begin::Page Vendors(used by this page) -->
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('assets/js/demo1/pages/crud/datatables/basic/basic.js')}}" type="text/javascript"></script>
{{--    <script src="{{asset('assets/js/demo1/pages/crud/datatables/basic/scrollable.js')}}" type="text/javascript"></script>--}}
{{--    <script src="./assets/js/demo1/pages/crud/datatables/basic/scrollable.js" type="text/javascript"></script>--}}
{{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>--}}

    <script !src="">
        $(document).ready( function () {
            $('#table_1').DataTable();
        } );
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
                url: "{{ url("admin/status_administration/")}}" + '/' + id,
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
    <script type="text/javascript">
        function deleteConfirmation(id) {
            var idRow =document.getElementById("user_row_"+id)
            swal.fire({
                title: "حذف؟",
                text: "الرجاء التأكيد على الموافقة",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "نعم, اتم الحذف!",
                cancelButtonText: "لا,تراجع!",
                confirmButtonColor: "#DD6B55",
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'delete',
                        url: "{{ url("admin/delete_administration/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                swal.fire("Done!", response.msg, "success");
                                idRow.remove();

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
    <script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready( function () {
            $(".kt-select2").select2({
                placeholder: "Select a Kitchen",
                allowClear: true
            });
        } );

    </script>
@endsection

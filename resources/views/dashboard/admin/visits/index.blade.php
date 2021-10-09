@extends('dashboard.layouts.app')
@section('style')
    <style>
        .select2-container {
            width:100% !important;
        }
        .zoom:hover {
            transform: scale(1.5);
        }
        .zoom{
            width:100%;
            height:300px
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
                    {{__('Visits Page') }}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('admin.visits.index')}}" class="kt-subheader__breadcrumbs-link">
                            {{__('Visits')}}
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
                            {{__('Visits Page')}}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table  table-bordered table-hover  " id="table_1">
                        <thead>
                        <tr>
                            <th >{{__('No')}}</th>
                            <th>{{__('User Name')}}</th>
                            <th>{{__('Salon Name')}}</th>
                            <th>{{__('Appointment Date')}}</th>
                            <th>{{__('Appointment Time')}}</th>
                            <th>{{__('Appointment Cost')}}</th>
                            <th>{{__('Services')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visits as $visit)
                            <tr id="user_row_{{$visit->id}}">
                                <td >#{{$visit->id}}</td>
                                <td>
                                    <a href="{{ route('admin.users.profile.public',$visit->user->id)}}">
                                        {{$visit->user->name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.traders.profile.public',[1,$booking->center->id])}}">
                                        {{$booking->center->name}}
                                    </a>
                                </td>
                                <td>{{$visit->date}}</td>
                                <td>{{$visit->time ??__('Not Found')}}</td>
                                <td>{{$visit->cost}}</td>
                                <td>
                                    <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_{{$visit->id}}">
                                        {{__('Visits Details')}}
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
    @foreach($visits as $visit)
        <!--begin::Modal-->
        <div class="modal fade" id="kt_modal_{{$visit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('Visit No')}}
                            {{$visit->id}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="extra-info text-black-50" id="lightgallery_{{$visit->id}}">
                            <table class="table  table-bordered table-hover  " id="table_7">
                                <thead>
                                <tr>
                                    <th>{{__('Service Name')}}</th>
                                    <th>{{__('Price')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($visit->services as $item)
                                    <tr>
                                        <td>
                                            {{$item->name ?? 'Not Found'}}
                                        </td>
                                        <td>{{$item->price ??''}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="extra-info">
                                <table class="table  table-bordered table-hover  " id="table_8">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">{{__('Value')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">{{__('Total Cost')}}</td>
                                        <td class="text-center">{{$visit->cost}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

        <!--end::Modal-->
    @endforeach

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            @foreach($visits as $visit)
            $('#lightgallery_{{$visit->id}}').lightGallery({
                selector: '.photo-pop'
            });
            @endforeach
        });
    </script>
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
                        url: "{{ url("admin/delete_user/")}}/" + id,
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

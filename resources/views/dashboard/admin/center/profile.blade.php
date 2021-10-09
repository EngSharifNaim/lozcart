@extends('dashboard.layouts.app')
@section('style')
    <style>
        .select2-container {
            width: 100% !important;
        }
        #table_1 ,#table_2,#table_3
        {
            width: 1500px !important;
        }
        .zoom:hover {
            transform: scale(1.5);
        }

    </style>
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
    {{--    <link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />--}}

    {{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">--}}
    <link href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css"/>


@endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                        {{$users->name}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i
                            class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.doctor.index')}}" class="kt-subheader__breadcrumbs-link">
                        {{__('Doctors Page') }}
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.user.profile',$users->id)}}" class="kt-subheader__breadcrumbs-link">

                        {{$users->name}}
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

            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>

                <!--End:: App Aside Mobile Toggle-->

                <!--Begin:: App Aside-->
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

                    <!--begin:: Widgets/Applications/User/Profile4-->
                    <div class="kt-portlet kt-portlet--height-fluid-">
                        <div class="kt-portlet__body">

                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        {{--                                        {{ env('BACKEND_URL') . "{img/$doctor->photo}"}}--}}
                                        <img class="kt-widget__img kt-hidden-" src="{{ env('BACKEND_URL') .$users->logo}}"
                                             alt="image">
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                        </div>
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                @if(App::isLocale('en'))
                                                    {{$users->name}}
                                                @else
                                                    {{$users->name}}
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Category')}}:</span>
                                            <p class="kt-widget__data">{{$users->category->name}}</p>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Email')}}:</span>
                                            <a href="#" class="kt-widget__data">{{$users->email}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Mobile')}}:</span>
                                            <a href="#" class="kt-widget__data">{{$users->mobile}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Address')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$users->address}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Open Time')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$users->open_time}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Close Time')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$users->close_time}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Work Days')}}:</span>
                                            <span class="kt-widget__data">
                                                @foreach($days as $day)
                                                    {{$day}},
                                                @endforeach
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Number of bookings')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$users['bookings']->count()}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Medical visits')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$users['visits']->count()}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>

                    <!--end:: Widgets/Applications/User/Profile4-->

                    <!--Begin:: Portlet-->
                {{--                    <div class="kt-portlet">--}}
                {{--                        <div class="kt-portlet__body">--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                <!--end:: Portlet-->
                </div>

                <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">

                        <div class="col-xl-12">

                            <!--begin:: Widgets/Last Updates-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            {{__('Bookings')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_1">
                                        <thead>
                                        <tr>
                                            <th >{{__('No')}}</th>
                                            <th>{{__('Patient Name')}}</th>
                                            <th>{{__('Doctor Name')}}</th>
                                            <th>{{__('Status')}}</th>
                                            <th>{{__('Appointment Date')}}</th>
                                            <th>{{__('Appointment Time')}}</th>
                                            <th>{{__('Appointment Cost')}}</th>
                                            <th>{{__('Insurance')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users['bookings'] as $booking)
                                            <tr id="user_row_{{$booking->id}}">
                                                <td >#{{$booking->id}}</td>
                                                <td>
                                                    <a href="{{ route('admin.patient.profile.public',$booking->patient->id)}}">
                                                        @if(App::isLocale('en'))
                                                            {{$booking->patient->name}}
                                                        @else
                                                            {{$booking->patient->name}}
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <a  href="{{ route('admin.doctor.profile',[$users->type,$booking->doctor->id])}}">
                                                        {{$booking->doctor->name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    @if($booking->status ==0)
                                                        <span class="btn btn-label-success btn-pill">{{__('New')}}</span>
                                                    @endif
                                                    @if($booking->status ==1)
                                                        <span class="btn btn-label-primary btn-pill">{{__('Done')}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$booking->appointment_date}}</td>
                                                <td>{{$booking->appointment_time ??__('Not Found')}}</td>
                                                <td>{{$booking->cost_appointment}}</td>
                                                <td>{{$booking->patient_insurance->program->name}}</td>


                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>

                                    <!--end::Widget 12-->
                                </div>
                            </div>

                            <!--end:: Widgets/Last Updates-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">

                            <!--begin:: Widgets/Last Updates-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            {{__('Medical visits')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_2">
                                        <thead>
                                        <tr>
                                            <th >{{__('No')}}</th>
                                            <th>{{__('Patient Name')}}</th>
                                            <th>{{__('Doctor Name')}}</th>
                                            <th>{{__('Status')}}</th>
                                            <th>{{__('Appointment Date')}}</th>
                                            <th>{{__('Appointment Time')}}</th>
                                            <th>{{__('Appointment Cost')}}</th>
                                            <th>{{__('Insurance')}}</th>
                                            @can('appointments-details')
                                                <th>{{__('Actions')}}</th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users['visits'] as $booking)
                                            <tr id="user_row_{{$booking->id}}">
                                                <td >#{{$booking->id}}</td>
                                                <td>
                                                    <a href="{{ route('admin.patient.profile.public',$booking->patient->id)}}">
                                                        @if(App::isLocale('en'))
                                                            {{$booking->patient->name}}
                                                        @else
                                                            {{$booking->patient->name}}
                                                        @endif
                                                    </a>

                                                </td>
                                                <td>
                                                    <a  href="{{ route('admin.doctor.profile',[$users->type,$booking->doctor->id])}}">
                                                        {{$booking->doctor->name}}
                                                    </a>

                                                </td>
                                                <td>
                                                    @if($booking->status ==0)
                                                        <span class="btn btn-label-success btn-pill">{{__('New')}}</span>
                                                    @endif
                                                    @if($booking->status ==1)
                                                        <span class="btn btn-label-primary btn-pill">{{__('Done')}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$booking->appointment_date}}</td>
                                                <td>{{$booking->appointment_time ??__('Not Found')}}</td>
                                                <td>{{$booking->cost_appointment}}</td>
                                                <td>
                                                    @if ($booking->patient_insurance)
                                                        {{$booking->patient_insurance->program->name}}
                                                    @endif

                                                </td>
                                                @can('appointments-details')
                                                    <td>
                                                        <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_{{$booking->id}}">
                                                            {{__('Visit Details')}}
                                                        </button>
                                                    </td>
                                                @endcan

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>

                                    <!--end::Widget 12-->
                                </div>
                            </div>

                            <!--end:: Widgets/Last Updates-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">

                            <!--begin:: Widgets/Last Updates-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            {{__('Doctors')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_3">
                                        <thead>
                                        <tr>
                                            <th >{{__('No')}}</th>
                                            <th>{{__('Doctor Name')}}</th>
                                            <th>{{__('Specialization')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Mobile')}}</th>
                                            <th>{{__('Appointment Cost')}}</th>
                                            {{--                                            <th>{{__('Actions')}}</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users['doctors'] as $doctor)
                                            <tr id="user_row_{{$doctor->id}}">
                                                <td >#{{$doctor->id}}</td>
                                                <td>
                                                    <a  href="{{ route('admin.doctor.profile',[$users->type,$doctor->id])}}">
                                                        {{$doctor->name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{$doctor->specialization}}
                                                </td>
                                                <td>{{$doctor->email}}</td>
                                                <td>{{$doctor->mobile}}</td>
                                                <td>{{$doctor->cost_appointment}}</td>

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>

                                    <!--end::Widget 12-->
                                </div>
                            </div>

                            <!--end:: Widgets/Last Updates-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">

                            <!--begin:: Widgets/Last Updates-->
                            <div class="kt-portlet kt-portlet--height-fluid">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">
                                            {{__('Patients')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_4">
                                        <thead>
                                        <tr>
                                            <th >{{__('No')}}</th>
                                            <th>{{__('Patient Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Mobile')}}</th>
                                            {{--                                            <th>{{__('Actions')}}</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users['patient'] as $patient)
                                            <tr id="user_row_{{$patient->patient->id}}">
                                                <td >#{{$patient->patient->id}}</td>
                                                <td>
                                                    <a href="{{ route('admin.patient.profile.public',$booking->patient->id)}}">
                                                        {{$patient->patient->name}}
                                                    </a>
                                                    {{--                                                    {{$patient->patient->name}}--}}
                                                </td>
                                                <td>{{$patient->patient->email}}</td>
                                                <td>{{$patient->patient->mobile}}</td>
                                                {{--                                                <td>--}}
                                                {{--                                                    <a class="btn btn-warning" href="{{ route('admin.patient.profile',[$type,$patient->patient->id,$patient->medical_center_id])}}">--}}
                                                {{--                                                        {{__('Profile')}}--}}
                                                {{--                                                    </a>--}}
                                                {{--                                                </td>--}}
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>

                                    <!--end::Widget 12-->
                                </div>
                            </div>

                            <!--end:: Widgets/Last Updates-->
                        </div>
                    </div>
                </div>

                <!--End:: App Content-->
            </div>

            <!--End::App-->
        </div>

        <!-- end:: Content -->
    </div>
    @foreach($users['visits'] as $booking)
        <!--begin::Modal-->
        <div class="modal fade" id="kt_modal_{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('Visit No')}}
                            {{$booking->id}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="extra-info text-black-50" id="lightgallery">
                            @if ($booking->consultation)


                                <h3>{{__('consultation :')}}</h3>
                                <p>
                                    {{$booking->consultation->doctor_notes}}
                                </p>
                                <h3>{{__('consultation attachment:')}}</h3>
                                <div class="photo-pop text-center"
                                     data-src="{{ env('BACKEND_URL') .$booking->consultation->consultation_attachment->attachment_url}}"
                                     data-sub-html="<h4>

                                    </h4>">
                                    <a href="{{ env('BACKEND_URL') .$booking->consultation->consultation_attachment->attachment_url}}">
                                        <img class="kt-widget__img kt-hidden- zoom"
                                             src="{{ env('BACKEND_URL') .$booking->consultation->consultation_attachment->attachment_url}}"
                                             alt="image">
                                    </a>

                                </div>
                                <h3>{{__('Prescription ')}}</h3>
                                <p>
                                    {{$booking->consultation->prescription->prescription_details}}
                                </p>
                            @endif
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
            $('#lightgallery').lightGallery({
                selector: '.photo-pop'
            });
        });
    </script>
    <!--begin::Page Vendors(used by this page) -->
    <script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('assets/js/demo1/pages/crud/datatables/basic/basic.js')}}" type="text/javascript"></script>
    {{--        <script src="{{asset('assets/js/demo1/pages/crud/datatables/basic/scrollable.js')}}" ></script>--}}
    {{--    <script src="./assets/js/demo1/pages/crud/datatables/basic/scrollable.js" type="text/javascript"></script>--}}
    {{--    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>--}}

    <script !src="">
        $(document).ready(function () {
            $('#table_1').DataTable(
                {
                    scrollY:        "300px",
                    scrollX:        true,
                    scrollCollapse: true,
                    columnDefs: [
                        { width: '60px', targets: 0 },
                        { width: 150, targets: 1 },
                        { width: 150, targets: 2 },
                        { width: 150, targets: 3 },
                        { width: 150, targets: 4 },
                        { width: 150, targets: 5 },
                        { width: 150, targets: 6 },
                        { width: 150, targets: 7 },




                    ],
                }
            );
            $('#table_2').DataTable(
                {
                    scrollY:        "300px",
                    scrollX:        true,
                    scrollCollapse: true,
                    columnDefs: [
                        { width: 50, targets: 0 },
                        { width: 200, targets: 1 },
                        { width: 200, targets: 2 },
                        { width: 200, targets: 3 },
                        { width: 200, targets: 4 },
                        { width: 200, targets: 5 },
                        { width: 200, targets: 6 },
                        { width: 200, targets: 7 },
                            @can('appointments-details')
                        { width: 200, targets: 8 },
                        @endcan



                    ],
                }
            );
            $('#table_3').DataTable(
                {
                    scrollY:        "300px",
                    scrollX:        true,
                    scrollCollapse: true,
                    columnDefs: [
                        { width: '60px', targets: 0 },
                        { width: 150, targets: 1 },
                        { width: 150, targets: 2 },
                        { width: 100, targets: 3 },
                        { width: 150, targets: 4 },
                        { width: 150, targets: 5 },



                    ],
                }
            );
            $('#table_5').DataTable(
                {
                    scrollY:        "300px",
                    scrollX:        true,
                    scrollCollapse: true,
                    columnDefs: [
                        { width: 60, targets: 0 },
                        { width: 150, targets: 1 },
                        { width: 50, targets: 2 },
                        { width: 50, targets: 3 },
                        { width: 50, targets: 4 },
                        { width: 50, targets: 5 },
                        { width: 50, targets: 6 },
                        { width: 50, targets: 7 },



                    ],
                }
            );
            $('#table_4').DataTable(
                {
                }
            );

        });
    </script>
    <script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $(".kt-select2").select2({
                placeholder: "Select a Kitchen",
                allowClear: true
            });
        });

    </script>
@endsection

@extends('dashboard.layouts.app')
@section('style')
    <style>
        .select2-container {
            width: 100% !important;
        }
        #table_1 ,#table_2
        {
            width: 1200px !important;
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
                    {{$user->name}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i
                            class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.users.index',1)}}" class="kt-subheader__breadcrumbs-link">

                            {{__('User Page ') }}

                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.users.profile.public',$user->id)}}" class="kt-subheader__breadcrumbs-link">

                        {{$user->name}}
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
                                        {{--                                        {{ env('BACKEND_URL') . "{img/$patient->photo}"}}--}}
                                        <img class="kt-widget__img kt-hidden-" src="{{ url('../').'/'.$user->image}}"
                                             alt="image">
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                        </div>
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                @if(App::isLocale('en'))
                                                    {{$user->name}}
                                                @else
                                                    {{$user->name}}
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Email')}}:</span>
                                            <a href="#" class="kt-widget__data">{{$user->email}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Mobile')}}:</span>
                                            <a href="#" class="kt-widget__data">{{$user->mobile}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Number of bookings')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$user['bookings']->count()}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Visits')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$user['visits']->count()}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Number of Done Orders')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$orders_done->count()}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Number of New Orders')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$orders_new->count()}}
                                            </span>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">{{__('Number of Cancel Orders')}}:</span>
                                            <span class="kt-widget__data">
                                                    {{$orders_cancel->count()}}
                                            </span>
                                        </div>
                                        <!--begin:: Widgets/Announcements 2-->

                                        <!--end:: Widgets/Announcements 2-->
                                    </div>
                                </div>
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>

                    <!--end:: Widgets/Applications/User/Profile4-->

                    <!--Begin:: Portlet-->

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
                                            <th>{{__('Appointment Date')}}</th>
                                            <th>{{__('Appointment Time')}}</th>
                                            <th>{{__('Appointment Cost')}}</th>
                                            <th>{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user['bookings'] as $booking)
                                            <tr id="user_row_{{$booking->id}}">
                                                <td >#{{$booking->id}}</td>
                                                <td>{{$booking->date}}</td>
                                                <td>{{$booking->time ??__('Not Found')}}</td>
                                                <td>{{$booking->cost}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_booking_{{$booking->id}}">
                                                        {{__('Booking Details')}}
                                                    </button>
                                                </td>


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
                                            {{__('Visits')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_2">
                                        <thead>
                                        <tr>
                                            <th >{{__('No')}}</th>
                                            <th>{{__('Appointment Date')}}</th>
                                            <th>{{__('Appointment Time')}}</th>
                                            <th>{{__('Appointment Cost')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user['visits'] as $booking)
                                            <tr id="user_row_{{$booking->id}}">
                                                <td >#{{$booking->id}}</td>
                                                <td>{{$booking->date}}</td>
                                                <td>{{$booking->time ??__('Not Found')}}</td>
                                                <td>{{$booking->cost}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_{{$booking->id}}">
                                                        {{__('Visit Details')}}
                                                    </button>
                                                </td>

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
                                            {{__('New Orders')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_3">
                                        <thead>
                                        <tr>
                                            <th>{{__('Order No')}}</th>
                                            <th>{{__('Tax')}}</th>
                                            <th>{{__('Total Price')}}</th>
                                            <th>{{__('Product Sum')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders_new as $order)
                                            <tr id="user_row_{{$order->id}}">
                                                <td>#{{$order->order_no}}</td>
                                                <td>{{$order->tax}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>{{$order->product_sum}}</td>
                                                <td>
                                                    <form class="kt-form-"  method="post" action="javascript:void(0)" >
                                                        @csrf
                                                        <input type="text" value="{{$order->order_no}}" name="order_no" hidden>
{{--                                                        <input type="text" value="{{$order->orders_Trader->trader_id}}" name="trader_id" hidden>--}}
                                                        <button  type="submit" class="link-button btn btn-bold btn-label-brand btn-sm"   id="order_info">
                                                            {{__('Orders')}}
                                                        </button>
                                                    </form>
                                                </td>

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
                                            {{__('Done Orders')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_4">
                                        <thead>
                                        <tr>
                                            <th>{{__('Order No')}}</th>
                                            <th>{{__('Tax')}}</th>
                                            <th>{{__('Total Price')}}</th>
                                            <th>{{__('Product Sum')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders_done as $order)
                                            <tr id="user_row_{{$order->id}}">
                                                <td>#{{$order->order_no}}</td>
                                                <td>{{$order->tax}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>{{$order->product_sum}}</td>
                                                <td>
                                                    <form class="kt-form-"  method="post" action="javascript:void(0)" >
                                                        @csrf
                                                        <input type="text" value="{{$order->order_no}}" name="order_no" hidden>
{{--                                                        <input type="text" value="{{$order->orders_Trader->trader_id}}" name="trader_id" hidden>--}}
                                                        <button  type="submit" class="link-button btn btn-bold btn-label-brand btn-sm"   id="order_info">
                                                            {{__('Orders')}}
                                                        </button>
                                                    </form>
                                                </td>

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
                                            {{__('Cancel Orders')}}
                                        </h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">

                                    <!--begin::widget 12-->
                                    <table class="table  table-bordered table-hover" id="table_9">
                                        <thead>
                                        <tr>
                                            <th>{{__('Order No')}}</th>
                                            <th>{{__('Tax')}}</th>
                                            <th>{{__('Total Price')}}</th>
                                            <th>{{__('Product Sum')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders_cancel as $order)
                                            <tr id="user_row_{{$order->id}}">
                                                <td>#{{$order->order_no}}</td>
                                                <td>{{$order->tax}}</td>
                                                <td>{{$order->total_price}}</td>
                                                <td>{{$order->product_sum}}</td>
                                                <td>
                                                    <form class="kt-form-"  method="post" action="javascript:void(0)" >
                                                        @csrf
                                                        <input type="text" value="{{$order->order_no}}" name="order_no" hidden>
{{--                                                        <input type="text" value="{{$order->orders_Trader->trader_id}}" name="trader_id" hidden>--}}
                                                        <button  type="submit" class="link-button btn btn-bold btn-label-brand btn-sm"   id="order_info">
                                                            {{__('Orders')}}
                                                        </button>
                                                    </form>
                                                </td>

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
    @foreach($user['visits'] as $booking)
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
                        <div class="extra-info text-black-50" id="lightgallery_{{$booking->id}}">
                            <table class="table  table-bordered table-hover  " id="table_5">
                                <thead>
                                <tr>
                                    <th>{{__('Service Name')}}</th>
                                    <th>{{__('Price')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($booking->services as $item)
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
                                <table class="table  table-bordered table-hover  " id="table_6">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">{{__('Value')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">{{__('Total Cost')}}</td>
                                        <td class="text-center">{{$booking->cost}}</td>
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
    @foreach($user['bookings'] as $booking)
        <!--begin::Modal-->
        <div class="modal fade" id="kt_modal_booking_{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('Booking No')}}
                            {{$booking->id}}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="extra-info text-black-50" id="lightgallery_{{$booking->id}}">
                            <table class="table  table-bordered table-hover  " id="table_7">
                                <thead>
                                <tr>
                                    <th>{{__('Service Name')}}</th>
                                    <th>{{__('Price')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($booking->services as $item)
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
                                        <td class="text-center">{{$booking->cost}}</td>
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
    <!--begin::Modal-->
    <div class="modal fade" style="z-index: 999999;" id="kt_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Products')}}
                        {{--                            {{$order->ordre_no}}--}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table  table-bordered table-hover  " id="table_14">
                        <thead>
                        <tr>
                            <th>{{__('Product Name')}}</th>
                            <th>{{__('Quantity')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Total Price')}}</th>
                        </tr>
                        </thead>
                        <tbody class="body_new">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Orders')}}
                        {{--                            {{$order->ordre_no}}--}}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table  table-bordered table-hover  " id="table_10">
                        <thead>
                        <tr>
                            <th>{{__('Buyer Name')}}</th>
                            <th>{{__('Buyer Mobile')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Total Price')}}</th>
                            <th>{{__('Quantity')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody class="body_order">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            @foreach($user['visits'] as $booking)
            $('#lightgallery_{{$booking->id}}').lightGallery({
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




                    ],
                }
            );
            $('#table_2').DataTable(
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





                    ],
                }
            );
            $('#table_3').DataTable(
                {
                    scrollY:        "300px",
                    scrollX:        true,
                    scrollCollapse: true,
                    columnDefs: [
                        { width: 60, targets: 0 },
                        { width: 60, targets: 1 },
                        { width: 150, targets: 2 },
                        { width: 150, targets: 3 },
                        { width: 150, targets: 4 },




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
            $('#table_9').DataTable(
                {
                }
            );
            $('#table_10').DataTable(
                {
                }
            );
            $('#table_14').DataTable(
                {
                }
            );

        });
    </script>
    <script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
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
            function myData(products) {
                // console.log(products)
                $.each(products, function(i,obj){
                    console.log(obj)
                    $(".body_new").append("<tr><td>" + obj.product.name+ "</td><td>" + obj.quantity+ "</td><td>"+obj.price+ "</td><td>"+obj.total_price+ "</td></tr>");
                })
            }

            $(document).on("click", "#product_info", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $.ajax({
                    url: "{{ route('admin.order_products')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#kt_modal').modal('show');
                        var products = response.products;
                        $(".body_new").empty();
                        myData(products);
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
            function myData(orders) {
                // console.log(products)
                $.each(orders, function(i,obj){
                    console.log(obj)
                    $(".body_order").append("<tr>" +
                        "<td>" + obj.trader.name+ "</td>" +
                        "<td>" + obj.trader.mobile+ "</td>" +
                        "<td>"+obj.price+ "</td>" +
                        "<td>"+obj.total_price+ "</td>" +
                        "<td>" + obj.quantity+ "</td>" +
                        "<td>" +
                            "<form class='kt-form'  method='post' action='javascript:void(0)' >"+
                                '@csrf'+
                                "<input type='text' value='"+obj.order_no+"' name='order_no' hidden>"+
                                "<input type='text' value='"+obj.trader_id+"' name='trader_id' hidden>"+
                                "<button  type='submit' class='link-button btn btn-bold btn-label-brand btn-sm'   id='product_info'>"+
                                "{{__('Orders')}}"+
                                "</button>"+
                            "</form>"+
                        "</td>" +
                        "</tr>");
                })
            }

            $(document).on("click", "#order_info", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $.ajax({
                    url: "{{ route('admin.orders_user')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#kt_modal_order').modal('show');
                        var orders = response.orders;
                        $(".body_order").empty();
                        myData(orders);
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
@endsection

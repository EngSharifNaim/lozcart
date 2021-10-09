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
    <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">

@endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    @if ($status == 1)
                        {{__('Done Orders')}}
                    @endif
                    @if ($status == 0)
                        {{__('New Orders')}}
                    @endif
                    @if ($status == 2)
                        {{__('Cancel Orders')}}
                    @endif
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    @if ($status == 1)
                        <a href="{{route('trader.orders.index',$status)}}" class="kt-subheader__breadcrumbs-link">
                            {{__('Done Orders')}}
                        </a>
                    @endif
                    @if ($status == 0)
                        <a href="{{route('trader.orders.index',$status)}}" class="kt-subheader__breadcrumbs-link">
                            {{__('New Orders')}}
                        </a>
                    @endif
                    @if ($status == 2)
                        <a href="{{route('trader.orders.index',$status)}}" class="kt-subheader__breadcrumbs-link">
                            {{__('Cancel Orders')}}
                        </a>
                    @endif




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
                            @if ($status == 1)
                                {{__('Done Orders')}}
                            @endif
                            @if ($status == 0)
                                {{__('New Orders')}}
                            @endif
                            @if ($status == 2)
                                {{__('Cancel Orders')}}
                            @endif
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
                            <th>{{__('Order No')}}</th>
                            <th>{{__('User Name')}}</th>
                            <th>{{__('Tax')}}</th>
                            <th>{{__('Total Price')}}</th>
                            <th>{{__('Product Sum')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody id="lightgallery">
                        @foreach($orders as $order)
                            <tr id="user_row_{{$order->id}}">
                                <td>#{{$order->order_no}}</td>
                                <td>
                                    @if ($order->user_type =='User')
                                        <a href="{{ route('admin.users.profile.public',$order->user->id)}}">
                                            {{$order->user->name}}
                                        </a>
                                    @endif
                                    @if ($order->user_type =='Center')
                                        <a href="{{ route('admin.traders.profile.public',[1,$order->center->id])}}">
                                            {{$order->center->name}}
                                        </a>
                                    @endif
                                </td>
                                <td>{{$order->tax}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->product_sum}}</td>
                                <td>{{$order->user_type}}</td>
{{--                                <td>--}}
{{--                                    @if($product->status ==0)--}}
{{--                                        <span class="btn btn-label-success btn-pill">{{__('New')}}</span>--}}
{{--                                    @endif--}}
{{--                                    @if($product->status ==1)--}}
{{--                                        <span class="btn btn-label-danger btn-pill">{{__('Done')}}</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
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

                    <!--end: Datatable -->
                </div>
            </div>

            <!--End::Dashboard 1-->
        </div>

        <!-- end:: Content -->
    </div>
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

    <script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo1/pages/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>


    <script src="{{asset('assets/lightgallery/light-gallary.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
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
                        "{{__('Products')}}"+
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

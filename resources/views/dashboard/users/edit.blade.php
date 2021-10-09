@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <style>
        .modal-slide-in .modal-dialog.sidebar-sm {
            width: 55rem !important;
        }
        .addressPlaceWrap {
            display: flex;
            margin-bottom: 1rem;
        }
        .addressPlaceWrap .placeActived {
            background-color: #233 !important;
            color: #fff;
            border-color: #233 !important;
            box-shadow: none !important;
        }
        #map {
            width: 100% !important;
            height: 250px !important;
            position: relative !important;
            overflow: hidden !important;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Client')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{__('Clients')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Client')}}
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
                                    <h4 class="card-title">{{__('Edit Client')}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form id="editData">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>
                                                            {{__('Personal Data')}}
                                                        </h4>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name" class="control-label">
                                                            {{__('Name')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <input required="" value="{{$user->name}}" id="name" type="text" name="name" class="form-control" placeholder="{{__('Name')}}" aria-required="true">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name" class="control-label">
                                                            {{__('Email')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <input required="" value="{{$user->email}}" id="email" type="text" name="email" class="form-control" placeholder="{{__('Email')}}" aria-required="true">
                                                    </div>
                                                    <div class="form-row col-md-12">

                                                        <div class="form-group col-md-7">
                                                            <label for="mobile" class="control-label">
                                                                {{__('Mobile')}}
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <input required="" value="{{$user->mobile}}" id="mobile" type="text" name="mobile" class="form-control" placeholder="{{__('Mobile')}}" aria-required="true">
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="name" class="control-label " style="opacity: 0" >
                                                                {{__('country')}}
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <select class="select2 w-100" name="country_id" id="country_id">

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button id="edit_client"  type="button" class=" btn btn-success waves-effect waves-light">
                                                            {{__('Save')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form id="updatePassword">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>
                                                            {{__('Password Update')}}
                                                            <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" title="{{__('At least 6 characters long')}}" style="border-radius: 25px;">
                                                                <i data-feather='alert-circle' ></i>
                                                            </span>
                                                            <span style="color: red">*</span>
                                                        </h4>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label  for="password" class="control-label">{{__('Password')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <input required type="password" name="password" class="form-control" value="" placeholder="{{__('New Password')}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="password" class="control-label">{{__('Password confirmation')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <input required type="password" name="password_confirmation" class="form-control" value="" placeholder="{{__('Verify Password')}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button id="update_password"  type="button" class=" btn btn-success waves-effect waves-light">
                                                            {{__('Password Update')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /jQuery Validation -->
                    </div>
                </section>
                <!-- /Validation -->
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom p-1">
                                    <div class="head-label">
                                            <h6 class="mb-0">{{__('Delivery Addresses')}}</h6>
                                    </div>
                                    @can('Create Client Address')
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <button class="dt-button create-new btn btn-success" data-toggle="modal" data-target="#modals-slide-in"   type="button" >
                                                <i data-feather="plus"></i>
                                                {{__('Add New Delivery Address')}}
                                            </button>
                                        </div>
                                    </div>
                                    @endcan
                                </div>
                                <table class="datatables-basic table" >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>id</th>
                                        <th>{{__('#')}}</th>
                                        <th>{{__('City')}}</th>
                                        <th>{{__('Address Name')}}</th>
                                        <th>{{__('Address')}}</th>
                                        <th>{{__('Mobile')}}</th>
{{--                                        <th>{{__('')}}</th>--}}
                                        @canany(['Delete Client Address','Edit Client Address','Show Client Address'])
                                            <th>{{__('Action')}}</th>
                                        @endcanany
                                    </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form class="add-new-record modal-content pt-0" id="add_address" method="POST" enctype="multipart/form-data">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('Add New Delivery Address')}}</h5>
                                </div>
                             <div class="modal-body flex-grow-1">
                                    <div class="row">
                                        <input required="" name="lat" id="latitude" value="21.491230798523393" type="hidden" >
                                        <input required="" name="lng" id="longitude" value="39.21824920654297" type="hidden" >
                                        <input required="" name="type" id="addresType" value="Home" type="hidden" >
                                        <div class="form-row">
                                        <div class="form-group col-md-12">

                                                <div class="addressPlaceWrap">
                                                    <button class="btn placeActived PlaceBtn" type="button" data-place="Home" data-type="المنزل">
                                                        <i class="fas fa-home"></i>{{__('House')}}
                                                    </button>
                                                    <button class="btn PlaceBtn" type="button" data-place="Work" data-type="مكان العمل">
                                                        <i class="fas fa-briefcase"></i>{{__('Workplace')}}
                                                    </button>
                                                    <button class="btn PlaceBtn" type="button" data-place="Other" data-type="غير ذلك">
                                                        <i class="fas fa-plus"></i>{{__('Other')}}
                                                    </button>

                                                </div>

                                            </div>
                                            <div class="form-group col-md-6" id="name_place" style="display: none;">
                                                <label for="country" class="control-label">
                                                    {{__('Name')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input style="display: none;" required
                                                       value="المنزل" id="placeInput"
                                                       type="text"
                                                       name="title"
                                                       class="form-control"
                                                       placeholder="اسم العنوان (منزل، عمل، أخرى)*">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="country" class="control-label">
                                                    {{__('Address')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input required=""  id="address" type="text" name="details" class="form-control" placeholder="{{__('Address')}}" aria-required="true">

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="country" class="control-label">
                                                    {{__('Mobile')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input required="" value="" id="mobile" type="text" name="mobile" class="form-control" placeholder="{{__('Mobile')}}" aria-required="true">
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="country" class="control-label">
                                                    {{__('State/Province')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input required=""  id="state" type="text" name="state" class="form-control" placeholder="{{__('State/Province')}}" aria-required="true">

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="country" class="control-label">
                                                    {{__('City')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input required=""  id="city" type="text" name="city" class="form-control" placeholder="{{__('City')}}" aria-required="true">

                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="country" class="control-label">
                                                    {{__('Country')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <select class="select2 w-100" name="country_id" id="country_id_modal">
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="country" class="control-label">
                                                    {{__('Postal code')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <input required=""  id="postal_code" type="text" name="postal_code" class="form-control" placeholder="{{__('Postal code')}}" aria-required="true">

                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="addressPlaceWrap">--}}
{{--                                                    <button class="btn placeActived PlaceBtn" type="button" data-place="Home" data-type="المنزل">--}}
{{--                                                        <i class="fas fa-home"></i>{{__('House')}}--}}
{{--                                                    </button>--}}
{{--                                                    <button class="btn PlaceBtn" type="button" data-place="Work" data-type="مكان العمل">--}}
{{--                                                        <i class="fas fa-briefcase"></i>{{__('Workplace')}}--}}
{{--                                                    </button>--}}
{{--                                                    <button class="btn PlaceBtn" type="button" data-place="Other" data-type="غير ذلك">--}}
{{--                                                        <i class="fas fa-plus"></i>{{__('Other')}}--}}
{{--                                                    </button>--}}

{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input style="display: none;" required--}}
{{--                                                       value="المنزل" id="placeInput"--}}
{{--                                                       type="text"--}}
{{--                                                       name="title"--}}
{{--                                                       class="form-control"--}}
{{--                                                       placeholder="اسم العنوان (منزل، عمل، أخرى)*">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-row col-md-12">--}}
{{--                                                <div class="form-group col-md-7">--}}
{{--                                                    <input required="" value="" id="mobile" type="text" name="mobile" class="form-control" placeholder="{{__('Mobile')}}" aria-required="true">--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group col-md-5">--}}
{{--                                                    <select class="select2 w-100" name="country_id" id="country_id_modal">--}}

{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-row col-md-12">--}}
{{--                                                <div class="form-group col-md-12">--}}
{{--                                                    <select class="select2 w-100" name="city" id="city_id">--}}

{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-row col-md-12">--}}
{{--                                                <div class="form-group col-md-12">--}}
{{--                                                    <input required="" value="" id="details" type="text" name="details" class="form-control" placeholder="{{__('Address (Street,Beside)')}}" aria-required="true">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}


{{--                                        </div>--}}
{{--                                        <div class="col-md-6">--}}
{{--                                            <div id="map"></div>--}}
{{--                                        </div>--}}

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="addAddress"  type="button" class=" btn btn-success waves-effect waves-light">
                                        {{__('Save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->

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
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwWXHYqVIpNRevJmhATImppUwKZfkwbtE"></script>
    <script src="{{asset('app-assets/custom/gmaps.js')}}"></script>
{{--    <script src="https://mapp.sa/webStore/js/vendor/gmaps.js"></script>--}}
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/custom/staff-validation.js')}}"></script>
    <!-- END: Page JS-->
    <script>
        $(function () {
            'use strict';

            var dt_basic_table = $('.datatables-basic'),
                assetPath = '{{asset('app-assets/')}}';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }

            // DataTable with buttons
            // --------------------------------------------------------------------

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('user.get_user_address',$user->id)}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: '' },
                        { data: 'city' },
                        { data: 'name' },
                        { data: 'address' },
                        { data: 'mobile' },
                        // { data: '' },
                        @canany(['Delete Client Address','Edit Client Address','Show Client Address'])
                        { data: '' },
                        @endcanany
                    ],
                    columnDefs: [
                        {
                            // For Responsive
                            className: 'control',
                            orderable: false,
                            responsivePriority: 2,
                            targets: 0
                        },
                        {
                            // For Checkboxes
                            targets: 1,
                            orderable: false,
                            responsivePriority: 3,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input dt-checkboxes sub_chk" name="" type="checkbox" value="'+full.id+'" id="checkbox' +
                                    data +
                                    '" /><label class="custom-control-label" for="checkbox' +
                                    data +
                                    '"></label></div>'
                                );
                            },
                            checkboxes: {
                                selectAllRender:
                                    '<div class="custom-control custom-checkbox"> <input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>'
                            }
                        },
                        {
                            targets: 2,
                            orderable: false,
                            visible: false
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 3,
                            orderable: false,
                            responsivePriority: 4,
                            render: function (data, type, full, meta) {
                                var $row_output =
                                    meta.row+1;
                                return $row_output;
                            }
                        },
                        {
                            targets: 4,
                            orderable: false,
                        },
                        {
                            targets: 5,
                            orderable: false,
                        },
                        {
                            targets:6,
                            orderable: false,
                        },
                        {
                            targets: 7,
                            orderable: false,
                        },
                        {{--{--}}
                        {{--    // Avatar image/badge, Name and post--}}
                        {{--    targets: 5,--}}
                        {{--    render: function (data, type, full, meta) {--}}
                        {{--        var $country = full['country'];--}}
                        {{--        // console.log($countries.name)--}}


                        {{--        // $name = full['market_name'];--}}
                        {{--        if ($country) {--}}
                        {{--            // For Avatar image--}}
                        {{--            var $output1=''--}}
                        {{--            // $.each($countries, function (i, option) {--}}
                        {{--            // var $country=option.name_ar--}}
                        {{--            // console.log($category)--}}
                        {{--            $output1  +=--}}
                        {{--                --}}{{--    '<span >' +--}}
                        {{--                    --}}{{--    @if(App::isLocale('en')) $country.name @else $country.name_ar @endif +--}}
                        {{--                    --}}{{--'</span>';--}}
                        {{--                    '<div class="d-flex justify-content-left align-items-center">'+--}}
                        {{--                '<div class="avatar  mr-1">'+--}}
                        {{--                '<img src="{{asset('uploads/countries/').'/'}}'+$country.flag+'" alt="Avatar" width="32" height="32">'+--}}
                        {{--                // <span class="avatar-content">O</span>--}}
                        {{--                '</div>'+--}}
                        {{--                '<div class="d-flex flex-column">'+--}}
                        {{--                '<span class="emp_name text-truncate font-weight-bold">'+--}}
                        {{--                @if(App::isLocale('en')) $country.name @else $country.name_ar @endif+--}}
                        {{--            '</span>'+--}}
                        {{--            '</div>'+--}}
                        {{--            '</div>';--}}
                        {{--            // $output1  += ',';--}}
                        {{--            // });--}}
                        {{--        }--}}
                        {{--        else {--}}
                        {{--            $output1  += '<span > {{__("Not Found")}}</span>'--}}
                        {{--        }--}}

                        {{--        var $row_output =''+--}}
                        {{--            $output1 ;--}}
                        {{--        return $row_output;--}}
                        {{--    }--}}
                        {{--},--}}
                        {{--{--}}
                        {{--    // Avatar image/badge, Name and post--}}
                        {{--    targets: 8,--}}
                        {{--    render: function (data, type, full, meta) {--}}
                        {{--        var $location_long = full['location_long'];--}}
                        {{--        var $location_lat = full['location_lat'];--}}


                        {{--        // $name = full['market_name'];--}}
                        {{--            var $output1=''--}}
                        {{--        if ($location_long && $location_lat) {--}}
                        {{--            // For Avatar image--}}

                        {{--            $output1  +=--}}
                        {{--                '<a href="https://www.google.com/maps/search/?api=1&query='+$location_long+','+$location_long+'">'+--}}
                        {{--                '{{__("Show On Map")}}'+--}}
                        {{--                '<i class="fas fa-map-marker-alt"></i>'+--}}
                        {{--                '</a>';--}}

                        {{--        }--}}
                        {{--        else {--}}
                        {{--            $output1  += '<span > {{__("Not Found")}}</span>'--}}
                        {{--        }--}}
                        {{--        var $row_output =''+--}}
                        {{--            $output1 ;--}}
                        {{--        return $row_output;--}}
                        {{--    }--}}
                        {{--},--}}
                            @canany(['Delete Brands','Edit Brands'])

                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'" class="dropdown-item delete-record">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    '</a>'

                                );
                            }
                        }
                        @endcanany
                    ],
                    order: [[1, 'desc']],
                    dom:  "<'row'<'col-sm-2'l><'col-sm-7'B><'col-sm-2'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        {
                            text: feather.icons['trash-2'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Delete')}}' ,
                            className: 'delete_all btn btn-primary',
                            attr: {
                                'onclick':'deleteAll()'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                    ],
                    displayLength: 7,
                    lengthMenu: [7, 10, 25, 50, 75, 100],

                    {{--                        @can('Create Brands')--}}
                        {{--                            dom:--}}
                        {{--                                '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',--}}
                        {{--                            buttons: [--}}
                        {{--                                {--}}
                        {{--                                    text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + '{{__("Add New Brand")}}',--}}
                        {{--                                    className: 'create-new btn btn-primary',--}}
                        {{--                                    attr: {--}}
                        {{--                                        'data-toggle': 'modal',--}}
                        {{--                                        'data-target': '#modals-slide-in'--}}
                        {{--                                        // 'onclick':"window.location.href='http://127.0.0.1:8000/user/create'",--}}
                        {{--                                    },--}}
                        {{--                                    init: function (api, node, config) {--}}
                        {{--                                        $(node).removeClass('btn-secondary');--}}
                        {{--                                    }--}}
                        {{--                                }--}}
                        {{--                            ],--}}
                        {{--                            @endcan--}}
                    responsive: {
                        details: {
                            display: $.fn.dataTable.Responsive.display.modal({
                                header: function (row) {
                                    var data = row.data();
                                    return 'Details of ' + data['full_name'];
                                }
                            }),
                            type: 'column',
                            renderer: function (api, rowIdx, columns) {
                                var data = $.map(columns, function (col, i) {
                                    console.log(columns);
                                    return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
                                        ? '<tr data-dt-row="' +
                                        col.rowIndex +
                                        '" data-dt-column="' +
                                        col.columnIndex +
                                        '">' +
                                        '<td>' +
                                        col.title +
                                        ':' +
                                        '</td> ' +
                                        '<td>' +
                                        col.data +
                                        '</td>' +
                                        '</tr>'
                                        : '';
                                }).join('');

                                return data ? $('<table class="table"/>').append(data) : false;
                            }
                        }
                    },
                    language: {
                        "lengthMenu": "{{__('Show')}} _MENU_ {{__('entries')}}",
                        "processing":     "{{__('Processing...')}}",
                        "search":         "{{__('Search:')}}",
                        "info":           "{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}",
                        "zeroRecords":    "{{__('No matching records found')}}",
                        "emptyTable":     "{{__('No data available in table')}}",
                        "infoEmpty":      "{{__('Showing')}} 0 {{__('to')}} 0 {{__('of')}} 0 {{__('entries')}}",
                        "infoFiltered":   "({{__('filtered from')}} _MAX_ {{__('total entries')}} )",
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    }
                });

            }


        });

    </script>
{{--edit data Client--}}
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

            $(document).on("click", "#edit_client", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#edit_client').html('');
                $('#edit_client').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                var $form2 = $(this.form);
                if(! $form2.valid()) {
                    return false
                };
                if ($form2.valid()) {
                    $.ajax({
                        url: "{{ route('user.update',$user->id)}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#edit_client').empty();
                            $('#edit_client').html('{{__('Save')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    response.success,
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
                            $('#edit_client').empty();
                            $('#edit_client').html('{{__('Save')}}');
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
{{--    add new Address--}}
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

            $(document).on("click", "#addAddress", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#addAddress').html('');
                $('#addAddress').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $.ajax({
                        url: "{{ route('user.address_store',$user->id)}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#addAddress').empty();
                            $('#addAddress').html('{{__('Save')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    response.success,
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            // document.getElementById("add_address").reset();
                            $('.datatables-basic').DataTable().ajax.reload();
                            $('.custom-error').remove();
                            $('#modals-slide-in').modal('hide');

                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#addAddress').empty();
                            $('#addAddress').html('{{__('Save')}}');
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
{{--    update password--}}
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

            $(document).on("click", "#update_password", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#update_password').html('');
                $('#update_password').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Updating')}}...</span>');
                var $form1 = $(this.form);
                if(! $form1.valid()) {
                    return false
                };
                if ($form1.valid()) {
                    $.ajax({
                        url: "{{ route('user.update_password',$user->id)}}",
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
                                    response.success,
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
{{--    get countries--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}}, selected: {{$country->id ==$user->country_id ?'true': 'false'}}, flag: "{{$country->flag}}", text: '{{ $country->name}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];
            var f =$('.select2');
            function formatCountry(country) {
                if (!country.id) { return country.text; }
                var $country = $(
                    '<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.key + '</span>'
                );
                return $country;
            };
            function formatState2 (country) {

                if (!country.id) {
                    return country.text;
                }
                var $country = $(
                    '<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.key + '</span>'
                );
                {{--if (country.id == {{$user->country_id}}){--}}

                {{--    var data = {--}}
                {{--        "id": country.id,--}}
                {{--        "text": country.text,--}}
                {{--    };--}}
                {{--        console.log(data)--}}
                {{--    $('#country_id').trigger({--}}
                {{--        type: 'select2:select',--}}
                {{--        params: {--}}
                {{--            data: data--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}

                return $country;

            };
            $("[name='country_id']").select2({
                placeholder: "Please Select a country",
                templateResult: formatCountry,
                templateSelection:formatState2,
                data: isoCountries
            });

            $('#CountryOfBirth').on('change', function () {
                console.log($(this).val())
            })
        });
    </script>
    {{--    get countries in modal--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#country_id_modal').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}}, selected: {{$country->id ==$user->country_id ?'true': 'false'}}, flag: "{{$country->flag}}", text: '{{ $country->name}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];
            function formatCountry(country) {
                if (!country.id) { return country.text; }
                var $country = $(
{{--                    '<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+--}}
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text + '</span>'
                );
                return $country;
            };
            function formatState2 (country) {

                if (!country.id) {
                    return country.text;
                }
                var $country = $(
                    {{--'<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+--}}
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text + '</span>'
                );
                {{--if (country.id == {{$user->country_id}}){--}}

                {{--    var data = {--}}
                {{--        "id": country.id,--}}
                {{--        "text": country.text,--}}
                {{--    };--}}
                {{--        console.log(data)--}}
                {{--    $('#country_id').trigger({--}}
                {{--        type: 'select2:select',--}}
                {{--        params: {--}}
                {{--            data: data--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}

                return $country;

            };
            $("#country_id_modal").select2({
                placeholder: "Please Select a country",
                templateResult: formatCountry,
                templateSelection:formatState2,
                data: isoCountries
            });

            $('#CountryOfBirth').on('change', function () {
                console.log($(this).val())
            })
        });
    </script>
{{--map--}}
    <script>
        var map, marker;
        var lt = 21.4858;
        var lg = 39.1925;
        var latlng = new google.maps.LatLng(lt, lg);
        map = new GMaps({
            el: '#map',
            lat: lt,
            lng: lg,
            zoom: 12,
            center: latlng,
            dragend: function (e) {
                var latlng = new google.maps.LatLng(e.center.lat(), e.center.lng());
                map.setCenter(e.center.lat(), e.center.lng());
                marker.setPosition(latlng);
                $('#latitude').val(e.center.lat());
                $('#longitude').val(e.center.lng());


            }
        });
        marker = map.createMarker({
            lat: lt,
            lng: lg,
            title: 'موقع التسليم',
            draggable: true,
            icon: '{{asset('photo').'/gps.png'}}',
            dragend: function (event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                $('#latitude').val(lat);
                $('#longitude').val(lng);

            },
        });


        map.addMarker(marker);

        function initialize() {
            GMaps.geolocate({
                success: function (position) {
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                    $('#latitude').val(position.coords.latitude);
                    $('#longitude').val(position.coords.longitude);
                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    marker.setPosition(latlng);

                },
                error: function (error) {
                    //   alert('Geolocation failed: '+error.message);
                },
                not_supported: function () {
                    //   alert("Your browser does not support geolocation");
                },
                always: function () {
                    //  alert("Done!");
                }
            });
        }
    </script>
{{-- btn type address--}}
    <script>
        $(document).ready(function (e) {
            $('.PlaceBtn').click(function (e) {
                var type = $(this).data('type');
                var place = $(this).data('place');
                if (place === 'Other') {
                    $('#addresType').val('Other');
                    $('#placeInput').val('');
                    $('#placeInput').show();
                    $('#name_place').show();

                } else {
                    $('#addresType').val(place);
                    $('#placeInput').val(type);
                    $('#placeInput').hide();
                    $('#name_place').hide();

                }
                // console.log($('#placeInput').val())

            });
        });
    </script>
    <script>

        $(function () {
            $('.addressPlaceWrap .PlaceBtn').on('click', function () {
                $(this).addClass('placeActived').siblings().removeClass('placeActived');
            })
        })
    </script>
    {{--    on change country get cities--}}
    <script>
        $(function () {
            cities();
            $(document).on('change', '#country_id_modal', function() {
                cities();
                return false;
            });
            // $(document).on('change', '#city_id', function() {
            //     area();
            //     return false;
            // });
            function cities() {
                $('option', $('#city_id')).remove();
                $('#city_id').append($('<option></option>').val('').html(' --- '));
                var countryIdVal = $('#country_id_modal').val() != null ? $('#country_id_modal').val() : '{{ old('country_id_modal') }}';
                $.get("{{ route('user.get_cities') }}", { country_id: countryIdVal }, function (data) {
                    $.each(data, function(val, text) {
                        // console.log(text.name)
                        var selectedVal = val == '{{ old('city_id') }}' ? "selected" : "";
                        @if(App::isLocale('en'))
                        $('#city_id').append($('<option ' + selectedVal + '></option>').val(text.name).html(text.name));
                        @else
                        $('#city_id').append($('<option ' + selectedVal + '></option>').val(text.name_ar).html(text.name_ar));
                        @endif
                    })
                }, "json");
            }

        });
    </script>
    {{--    delete One Row--}}
    <script >
        function deleteRow(id) {
            // var idRow =document.getElementById("role_row_"+id)
            swal.fire({
                title: "{{__('Delete')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes, delete!')}}",
                cancelButtonText: "{{__('No, cancel!')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'delete',
                        url: "{{ url("user/address_delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                swal.fire("Done!", response.msg, "success");
                                $('.datatables-basic').DataTable().ajax.reload();

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
    {{--    delete All--}}
    <script>
        // $('.delete_all').on('click', function(e) {
        function deleteAll(id) {

            var allVals = [];
            $(".sub_chk:checked").each(function () {
                allVals.push($(this).val());
            });


            if (allVals.length <= 0) {
                swal.fire({
                    title: "{{__('No items selected?')}}",
                    text: "{{__('Please select items to complete the process')}}",
                    type: "warning",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: '{{__('Ok')}}',
                    cancelButtonText: '{{__('No, cancel!')}}',
                    reverseButtons: false
                });
            } else {

                swal.fire({
                    title: "{{__('Delete')}}",
                    text: "{{__('Please confirm approval')}}",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "{{__('Yes, delete!')}}",
                    cancelButtonText: "{{__('No, cancel!')}}",
                    cancelButtonClass: 'btn-success',
                    confirmButtonClass: 'btn-danger',
                    reverseButtons: !0
                }).then(function (event) {
                    if (event.value === true) {


                        var join_selected_values = allVals.join(",");

// console.log($(this).data('url'))
                        $.ajax({
                            url: "{{ route('user.address_delete_multi') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("Done!", response.msg, "success");
                                    $('.datatables-basic').DataTable().ajax.reload();

                                } else {
                                    swal.fire("Error!", response.msg, "error");
                                }
                            }
                        });

                    } else {
                        event.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })

            }
        }
        // });
    </script>
    <script>
        $(document).ready(function() {

            // $form = $('#form_data');
//             $(function () {
//                 'use strict';
//
//                 var add_address_form = $('#add_address_form');
// // console.log(addClient)
//                 // jQuery Validation
//                 // --------------------------------------------------------------------
//                 if (addClient.length) {
//                     addClient.validate({
//
//                         rules: {
//                             'name': {
//                                 required: true,
//                             },
//                             'email': {
//                                 required: true,
//                                 email: true
//                             },
//                             password: {
//                                 required: true,
//                                 minlength: 9
//                             },
//                             'password_confirmation': {
//                                 required: true,
//                                 equalTo: '#password'
//                             },
//                             country_id: {
//                                 required: true
//                             },
//                             mobile: {
//                                 required: true,
//                                 minlength: 10
//                             },
//
//                         }
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

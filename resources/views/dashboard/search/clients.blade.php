@extends('dashboard.layouts.app')
@section('style')

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <!-- END: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
        <link rel="stylesheet" href="https://mapp.sa/cPanel/css/cropper.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />

        <style>
            .dropify-wrapper .dropify-message p {
                font-size: 17px;
            }
        </style>
        @if(App::isLocale('en'))
    @else

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
                            <h2 class="content-header-title float-left mb-0">{{__('Clients')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Clients')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom p-1">
                                    <div class="head-label">
                                        {{--                                        <h6 class="mb-0">DataTable with Buttons</h6>--}}
                                    </div>
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <button class="dt-button create-new btn btn-success" data-toggle="modal" data-target="#modals-slide-in"   type="button" >
                                                <i data-feather="plus"></i>
                                                {{__('Add New Client')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table class="datatables-basic table" >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>id</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Mobile')}}</th>
                                        <th>{{__('Country')}}</th>
                                        <th>{{__('Email')}}</th>
                                        <th>{{__('Count Orders')}}</th>
                                        @can('Suspended and Activate Client')
                                            <th>{{__('Status')}}</th>
                                        @endcan
                                        @canany(['Delete Client','Edit Client'])
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
                            <form class="add-new-record modal-content pt-0" id="add_client" method="POST" enctype="multipart/form-data">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('New Client')}}</h5>
                                </div>
                                {{--                                <div class="modal-body flex-grow-1">--}}
                                {{--                                    <div class="form-group">--}}
                                {{--                                        <label class="form-label" for="basic-icon-default-fullname">Name</label>--}}
                                {{--                                        <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-group">--}}
                                {{--                                        <label class="form-label" for="basic-icon-default-post">Post</label>--}}
                                {{--                                        <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-group">--}}
                                {{--                                        <label class="form-label" for="basic-icon-default-email">Email</label>--}}
                                {{--                                        <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />--}}
                                {{--                                        <small class="form-text text-muted"> You can use letters, numbers & periods </small>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-group">--}}
                                {{--                                        <label class="form-label" for="basic-icon-default-date">Joining Date</label>--}}
                                {{--                                        <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-group mb-4">--}}
                                {{--                                        <label class="form-label" for="basic-icon-default-salary">Salary</label>--}}
                                {{--                                        <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />--}}
                                {{--                                    </div>--}}
                                {{--                                    <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>--}}
                                {{--                                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>--}}
                                {{--                                </div>--}}
                                {{--                                <form id="tradMark"class="add-new-record modal-content pt-0" method="POST" enctype="multipart/form-data" >--}}
                                <div class="modal-body flex-grow-1">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="data" class="control-label">
                                                {{__('Personal Data')}}
                                                <span style="color: red">*</span>
                                            </label>
                                            <input required="" value="" id="name" type="text" name="name" class="form-control" placeholder="{{__('Name')}}" aria-required="true">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input required="" value="" id="email" type="text" name="email" class="form-control" placeholder="{{__('Email')}}" aria-required="true">
                                        </div>
                                        <div class="form-row col-md-12">
                                            <div class="form-group col-md-7">
                                                <input required="" value="" id="mobile" type="text" name="mobile" class="form-control" placeholder="{{__('Mobile')}}" aria-required="true">
                                            </div>
                                            <div class="form-group col-md-5">
                                                <select class="select2 w-100" name="country_id" id="country_id">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="image" class="control-label">{{__('Password')}}
                                                <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" title="{{__('At least 6 characters long')}}" style="border-radius: 25px;">
                                                    <i data-feather='alert-circle' ></i>
                                                </span>
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="password" name="password" class="form-control" value="" placeholder="{{__('New Password')}}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="password" name="password_confirmation" class="form-control" value="" placeholder="{{__('Verify Password')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="addClient"  type="button" class=" btn btn-success waves-effect waves-light">
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
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="https://mapp.sa/cPanel/libs/dropzone/dropzone.min.js"></script>
    <script src="https://mapp.sa/cPanel/js/cropper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>
    {{--    <script src="{{asset('')}}app-assets/js/scripts/tables/table-datatables-basic.js"></script>--}}

    {{--    <script src="{{asset('')}}app-assets/custom/staff.js"></script>--}}
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
                    ajax: "{{route('user.get_users')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'name' },
                        { data: 'mobile' },
                        { data: 'country' },
                        { data: 'email' },
                        { data: 'order_count' },
                            @can('Suspended and Activate Client')
                        { data: '' },
                            @endcan
                            @canany(['Delete Client','Edit Client'])
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
                            visible: false
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 3,
                            responsivePriority: 4,
                            render: function (data, type, full, meta) {
                                var $user_img = full['image'],
{{--                                    @if(App::isLocale('en'))--}}
                                    $name = full['name'];
{{--                                @else--}}
{{--                                    $name = full['name_ar'];--}}
{{--                                @endif--}}
                                // $name = full['market_name'];
                                if ($user_img) {
                                    // For Avatar image
                                    var $output =
                                        '<img src="{{asset('uploads/users/').'/'}}'+$user_img+'" alt="Avatar" width="32" height="32">';
                                } else {
                                    // For Avatar badge
                                    var stateNum = full['status'];
                                    var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
                                    var $state = states[stateNum],
{{--                                        @if(App::isLocale('en'))--}}
                                        $name = full['name'],
{{--                                        @else--}}
//                                         $name = full['name_ar'],
{{--                                        @endif--}}
                                        $initials = $name.match(/\b\w/g) || [];
                                    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                    $output = '<span class="avatar-content">' + $initials + '</span>';
                                }

                                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                                // Creates full output for row
                                var $row_output =
                                    '<a href="{{route('user.edit','').'/'}}'+full['id']+'">'+
                                    '<div class="d-flex justify-content-left align-items-center">' +
                                    '<div class="avatar ' +
                                    colorClass +
                                    ' mr-1">' +
                                    $output +
                                    '</div>' +
                                    '<div class="d-flex flex-column">' +
                                    '<span class="emp_name text-truncate font-weight-bold">' +
                                    $name +
                                    '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>';
                                return $row_output;
                            }
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 5,
                            render: function (data, type, full, meta) {
                                var $country = full['country'];
                                // console.log($countries.name)


                                // $name = full['market_name'];
                                if ($country) {
                                    // For Avatar image
                                    var $output1=''
                                    // $.each($countries, function (i, option) {
                                        // var $country=option.name_ar
                                        // console.log($category)
                                        $output1  +=
                                        {{--    '<span >' +--}}
                                        {{--    @if(App::isLocale('en')) $country.name @else $country.name_ar @endif +--}}
                                        {{--'</span>';--}}
                                    '<div class="d-flex justify-content-left align-items-center">'+
                                        '<div class="avatar  mr-1">'+
                                            '<img src="{{asset('uploads/countries/').'/'}}'+$country.flag+'" alt="Avatar" width="32" height="32">'+
                                            // <span class="avatar-content">O</span>
                                        '</div>'+
                                        '<div class="d-flex flex-column">'+
                                            '<span class="emp_name text-truncate font-weight-bold">'+
                                            @if(App::isLocale('en')) $country.name @else $country.name_ar @endif+
                                        '</span>'+
                                        '</div>'+
                                    '</div>';
                                        // $output1  += ',';
                                    // });
                                }
                                else {
                                    $output1  += '<span > {{__("Not Found")}}</span>'
                                }

                                var $row_output =''+
                                    $output1 ;
                                return $row_output;
                            }
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 7,
                            render: function (data, type, full, meta) {
                                var $order_count = full['order_count'];
                                console.log($order_count)


                                // $name = full['market_name'];
                                if ($order_count>=0) {
                                    // For Avatar image
                                    var $output1=''

                                        $output1  +=
                                            '<a href="{{route('user.orders','').'/'}}'+full['id']+'">'+
                                            '{{__("Show Orders")}}'+
                                            '('+
                                            $order_count+
                                            ')'+
                                            '</a>';

                                }
                                else {
                                    $output1  += '<span > {{__("Not Found")}}</span>'
                                }
                                var $row_output =''+
                                    $output1 ;
                                return $row_output;
                            }
                        },

                            @can('Suspended and Activate Clients')
                        {
                            // Actions
                            targets: -2,
                            title: 'Status',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-switch custom-switch-success">' +
                                    '<input type="checkbox" class="custom-control-input" onclick="changeStatus('+full.id+')" value="'+full.status+'" id="status-'+full.id+'" ' +
                                    (full.status == 1 ? 'checked': '') +
                                    ' />' +
                                    '<label class="custom-control-label" for="status-'+full.id+'">' +
                                    '<span class="switch-icon-left">'+
                                    feather.icons['check'].toSvg({ class: 'font-small-4' })+
                                    '</span>' +
                                    '<span class="switch-icon-right">x</span>' +
                                    '</label>' +
                                    '</div>'
                                );
                            }
                        },
                            @endcan
                            @canany(['Delete Client','Edit Client'])

                        {
                            // Actions
                            targets: -1,
                            title: 'Actions',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="d-inline-flex">' @can('Delete Client')+
                                    '<a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                                    '</a>' +
                                    '<div class="dropdown-menu dropdown-menu-right">' +
                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'" class="dropdown-item delete-record">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    'Delete</a>'@endcan +
                                    '</div>' +
                                    '</div>'@can('Edit Client') +
                                    '<a href="{{ route('user.edit','')}}'+"/"+full.id+'"  class="item-edit">' +
                                    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'@endcan

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
                    "oSearch": {"sSearch": "{{$keyword}}"},
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
    {{--    Add new Client--}}

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

            $(document).on("click", "#addClient", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#addClient').html('');
                $('#addClient').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('user.store')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#addClient').empty();
                        $('#addClient').html('{{__('Save')}}');
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
                        document.getElementById("add_client").reset();
                        $('.datatables-basic').DataTable().ajax.reload();
                        $('.custom-error').remove();
                        $('#modals-slide-in').modal('hide');
                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#addClient').empty();
                        $('#addClient').html('{{__('Save')}}');
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
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
            });

        });

    </script>
    {{--    delete One Row--}}
    <script type="text/javascript">
        function deleteRow(id) {
            // var idRow =document.getElementById("role_row_"+id)
            swal.fire({
                title: "حذف؟",
                text: "الرجاء التأكيد على الموافقة",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "نعم, اتم الحذف!",
                cancelButtonText: "لا,تراجع!",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'delete',
                        url: "{{ url("user/delete/")}}/" + id,
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
    <script type="text/javascript">

        // ev.allowSubmit = true;
        function changeStatus(id) {
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
            // var idRow = document.getElementById("user_row_" + id)

            $.ajax({
                url: "{{ url("brand/status")}}" + '/' + id,
                type: "POST",
                data: {
                    status: status_new,
                    _token: token,

                },
                success: function (response) {
                    setTimeout(function () {
                        toastr['success'](
                            response.success,
                            {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 2000);

                    $('.datatables-basic').DataTable().ajax.reload();

                },
                error: function (data) {
                    var response = data.responseJSON;
                    if (data.status == 422) {
                        if (typeof (response.responseJSON) != "undefined") {
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
                }
            });
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
                    title: "لا يوجد عناصر محدده؟",
                    text: "الرجاء تحديد عناصر لاتمام العملية",
                    type: "warning",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonText: 'حسناً',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: false
                });
            } else {

                swal.fire({
                    title: "حذف؟",
                    text: "الرجاء التأكيد على الموافقة",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "نعم, اتم الحذف!",
                    cancelButtonText: "لا,تراجع!",
                    cancelButtonClass: 'btn-success',
                    confirmButtonClass: 'btn-danger',
                    reverseButtons: !0
                }).then(function (event) {
                    if (event.value === true) {


                        var join_selected_values = allVals.join(",");

// console.log($(this).data('url'))
                        $.ajax({
                            url: "{{ route('user.delete_all') }}",
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
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            var isoCountries = [
                @foreach($countries as $country)
                {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}},  flag: "{{$country->flag}}", text: '{{ $country->name}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];

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
                // var baseUrl = 'https://mapp.sa';
                var $country = $(
                    '<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.key + '</span>'
                );
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

@endsection

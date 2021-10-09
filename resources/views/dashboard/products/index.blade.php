@extends('dashboard.layouts.app')
@section('style')

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <!-- END: Vendor CSS-->


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
                            <h2 class="content-header-title float-left mb-0">{{__('Products')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Products')}}
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
                                            <button class="dt-button create-new btn btn-success " tabindex="0" aria-controls="DataTables_Table_0" type="button" onclick="window.location.href='{{route('product.create')}}'">
                                                <i data-feather="plus"></i>
                                                {{__('Add New Product')}}
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
                                        <th>{{__('Code')}}</th>
                                        <th>{{__('Quantity')}}</th>
                                        <th>{{__('Price')}}</th>
                                        @can('Suspended and Activate Product')
                                        <th>{{__('Status')}}</th>
                                        @endcan
                                        @canany(['Delete Product','Edit Product'])
                                        <th>{{__('Action')}}</th>
                                        @endcanany
                                    </tr>
                                    </thead>

                                </table>

                            </div>
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
<script>
    var urlImage='{{url('uploads/products/')}}'
</script>
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
                    "initComplete": function(settings, json) {
                        var api = this.api();
                        var numRows = api.rows( ).count();
                        // Place the value in your HTML using jQuery, etc
                        $(".btn-product").html('{{__('Number of products : ')}}' +numRows);
                    },

                    ajax: "{{route('product.get_products')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'name' },
                        { data: 'code' },
                        { data: 'quantity' },
                        { data: 'price' },
                        @can('Suspended and Activate Product')
                            { data: '' },
                        @endcan
                        @canany(['Delete Product','Edit Product'])
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
                                var $user_img = full['cover_image'],
                                    @if(App::isLocale('en'))
                                    $name = full['name'];
                                    @else
                                    $name = full['name_ar'];
                                    @endif
                                    // $name = full['market_name'];
                                if ($user_img) {
                                    // For Avatar image
                                    var $output =
                                        '<img src="{{asset('uploads/products/').'/'}}'+$user_img+'" alt="Avatar" width="32" height="32">';
                                } else {
                                    // For Avatar badge
                                    var stateNum = full['status'];
                                    var states = ['success', 'danger', 'warning', 'info', 'dark', 'success ', 'secondary'];
                                    var $state = states[stateNum],
                                        @if(App::isLocale('en'))
                                        $name = full['name'],
                                        @else
                                        $name = full['name_ar'],
                                        @endif
                                        $initials = $name.match(/\b\w/g) || [];
                                    $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
                                    $output = '<span class="avatar-content">' + $initials + '</span>';
                                }

                                var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
                                // Creates full output for row
                                var $row_output =
                                    '<a href="#">'+
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

                        @can('Suspended and Activate Product')
                            {
                                // Actions
                                targets: -2,
                                title: '{{__('Status')}}',
                                orderable: false,
                                render: function (data, type, full, meta) {
                                    return (
                                        '<div class="custom-control custom-switch custom-switch-success">' +
                                        '<input type="checkbox" class="custom-control-input" onclick="changeStatus('+full.id+')" value="'+full.status+'" id="status-'+full.id+'" ' +
                                        (full.status ==1 ? 'checked': '') +
                                        ' />' +
                                        '<label class="custom-control-label" for="status-'+full.id+'">' +
                                        '<span class="switch-icon-left">'+
                                        // feather.icons['check'].toSvg({ class: 'font-small-4' })+
                                        '</span>' +
                                        // '<span class="switch-icon-right">x</span>' +
                                        '</label>' +
                                        '</div>'
                                    );
                                }
                            },
                        @endcan
                        @canany(['Delete Product','Edit Product'])

                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<a href="http://market.lozcart.com/{{App::IsLocale('en')?'en':'ar'}}/'+'{{$market_now->link}}'+'/product/'+full.id+'" target="_blank"   class="item-edit mr-1 ml-1">' +
                                    feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'+
                                    '@can('Delete Product')' +
                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'"  class="item-edit mr-1 ml-1">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'@endcan+
                                    '@can('Edit Product') '+
                                    '<a href="{{ route('product.edit','')}}'+"/"+full.id+'"  class="item-edit mr-1 ml-1">' +
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
                            text: feather.icons['play-circle'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Post on the store')}}' ,
                            className: 'btn_header status_all_allow btn btn-success mr-1 ml-1',
                            attr: {
                                'onclick':'status_all_allow()'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        },
                        {
                            text: feather.icons['pause-circle'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Stop Post')}}' ,
                            className: 'btn_header status_all_stop btn btn-success  mr-1 ml-1',
                            attr: {
                                'onclick':'status_all_stop()'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        },

                        {{--{--}}
                        {{--    text: feather.icons['file'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Export')}}' ,--}}
                        {{--    className: 'btn_header export btn-success  mr-1 ml-1',--}}
                        {{--    attr: {--}}
                        {{--        'onclick':'export()'--}}
                        {{--    },--}}
                        {{--    init: function (api, node, config) {--}}
                        {{--        $(node).removeClass('btn-secondary');--}}
                        {{--    }--}}
                        {{--},--}}
                        {{--{--}}
                        {{--    text: feather.icons['file'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Import')}}' ,--}}
                        {{--    className: 'btn_header import btn btn-success  mr-1 ml-1',--}}
                        {{--    attr: {--}}
                        {{--        'onclick':'import()'--}}
                        {{--    },--}}
                        {{--    init: function (api, node, config) {--}}
                        {{--        $(node).removeClass('btn-secondary');--}}
                        {{--    }--}}
                        {{--},--}}
                        {
                            text: feather.icons['trash-2'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Delete')}}' ,
                            className: 'delete_all btn btn-success  mr-1 ml-1',
                            attr: {
                                'onclick':'deleteAll()'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        },
                        {
                            text: '' ,
                            className: 'btn_header btn-product btn-success  mr-1 ml-1',

                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        },
                            ],
                    displayLength: 7,
                    // search:[3,'h'],
                    lengthMenu: [7, 10, 25, 50, 75, 100],

{{--                    @can('Create Product')--}}
{{--                    dom:--}}
{{--                        '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',--}}
{{--                    buttons: [--}}
{{--                        {--}}
{{--                            text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'Add New Staff',--}}
{{--                            className: 'create-new btn btn-success',--}}
{{--                            attr: {--}}
{{--                                'onclick':"window.location.href='http://127.0.0.1:8000/user/create'",--}}
{{--                            },--}}
{{--                            init: function (api, node, config) {--}}
{{--                                $(node).removeClass('btn-secondary');--}}
{{--                            }--}}
{{--                        }--}}
{{--                    ],--}}
{{--                    @endcan--}}
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
                    },

                });


            }


        });
    </script>

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
                        url: "{{ url("product/delete/")}}/" + id,
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
                url: "{{ url("product/status")}}" + '/' + id,
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
                            }, 2000);
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
{{--    delete all element check--}}
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
                            url: "{{ route('product.delete_all') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("{{__('Done!')}}", response.msg, "success");
                                    $('.datatables-basic').DataTable().ajax.reload();

                                } else {
                                    swal.fire("{{__('Error!')}}", response.msg, "error");
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
    {{--    stop element check--}}
    <script>
        // $('.delete_all').on('click', function(e) {
        function status_all_stop(id) {

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
                    title: "{{__('Stop Post')}}",
                    text: "{{__('Please confirm approval')}}",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "{{__('Yes, Stop Post!')}}",
                    cancelButtonText: "{{__('No, cancel!')}}",
                    cancelButtonClass: 'btn-success',
                    confirmButtonClass: 'btn-danger',
                    reverseButtons: !0
                }).then(function (event) {
                    if (event.value === true) {


                        var join_selected_values = allVals.join(",");

// console.log($(this).data('url'))
                        $.ajax({
                            url: "{{ route('product.status_all_stop') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("{{__('Done!')}}", response.msg, "success");
                                    $('.datatables-basic').DataTable().ajax.reload();

                                } else {
                                    swal.fire("{{__('Error!')}}", response.msg, "error");
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
        // $('.delete_all').on('click', function(e) {
        function status_all_allow(id) {

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
                    title: "{{__('Post on the store')}}",
                    text: "{{__('Please confirm approval')}}",
                    type: "error",
                    icon: 'warning',
                    showCancelButton: !0,
                    confirmButtonText: "{{__('Yes, Post on the store')}}",
                    cancelButtonText: "{{__('No, cancel!')}}",
                    cancelButtonClass: 'btn-success',
                    confirmButtonClass: 'btn-danger',
                    reverseButtons: !0
                }).then(function (event) {
                    if (event.value === true) {


                        var join_selected_values = allVals.join(",");

// console.log($(this).data('url'))
                        $.ajax({
                            url: "{{ route('product.status_all_allow') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("{{__('Done!')}}", response.msg, "success");
                                    $('.datatables-basic').DataTable().ajax.reload();

                                } else {
                                    swal.fire("{{__('Error!')}}", response.msg, "error");
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
@endsection

@extends('dashboard.layouts.app')
@section('style')

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
        <!-- END: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
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
                            <h2 class="content-header-title float-left mb-0">{{__('Orders')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Orders')}}
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
                                                {{__('Add New Order')}}
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
                                        <th>{{__('Order No')}}</th>
                                        <th>{{__('Client Name')}}</th>
                                        <th>{{__('Shipping State')}}</th>
                                        <th>{{__('Order Date')}}</th>
                                        <th>{{__('Payment')}}</th>
                                        <th>{{__('Shipping')}}</th>
                                        <th>{{__('Total Cost')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Action')}}</th>
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
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script>
        $("#type").select2({
            closeOnSelect : true,
            placeholder : "{{__('Select Discount Type')}}",
            allowHtml: true,
            // allowClear: true,
            // tags: true
        });
        $("#is_except_offers").select2({
            closeOnSelect : true,
            placeholder : "{{__('Select')}}",
            allowHtml: true,
            // allowClear: true,
            // tags: true
        });

    </script>
{{--    <script src="../../../app-assets/custom/staff.js"></script>--}}
    <!-- END: Page JS-->
    <script>
        $(function () {
            'use strict';

            var dt_basic_table = $('.datatables-basic'),
                assetPath = '{{asset('app-assets/')}}',
            statusObj = {
                1: { title: '0',text:'{{__("New")}}', class: 'badge-light-info' },
                2: { title: '1',text:'{{__("Processing")}}', class: 'badge-light-primary' },
                3: { title: '2',text:'{{__("Ready to ship")}}', class: 'badge-light-secondary' },
                4: { title: '3',text:'{{__("Delivering")}}', class: 'badge-light-warning' },
                5: { title: '4',text:'{{__("Delivered")}}', class: 'badge-light-success' },
                6: { title: '5',text:'{{__("Rejected")}}', class: 'badge-light-danger' },
            };
            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }

            // DataTable with buttons
            // --------------------------------------------------------------------

            if (dt_basic_table.length) {
                var dt_basic = dt_basic_table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('order.get_orders')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'order_no' },
                        { data: 'client_name' },
                        { data: 'country' },
                        { data: 'order_date' },
                        { data: 'payment' },
                        { data: 'shipping' },
                        { data: 'total_price' },
                        { data: 'status' },
                        { data: '' },
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
                            targets: 4,
                            responsivePriority: 4,
                            render: function (data, type, full, meta) {
                                var $user_img = full['image'],
                                    {{--                                    @if(App::isLocale('en'))--}}
                                    $name = full['client_name'];
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
                                        $name = full['client_name'],
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
                            // User Status
                            targets: 7,
                            render: function (data, type, full, meta) {
                                var $payment = full['payment'];
                                // console.log($payment.name)
                                return (
                                    '<span  " text-capitalized>' +
                                    $payment.name +
                                    '</span>'
                                );
                            }
                        },
                        {
                            // User Status
                            targets: 8,
                            render: function (data, type, full, meta) {
                                var $shipping = full['shipping'];
                                // console.log($payment.name)
                                return (
                                    '<span  " text-capitalized>' +
                                    $shipping.name +
                                    '</span>'
                                );
                            }
                        },
                        {
                            // User Status
                            targets: 10,
                            render: function (data, type, full, meta) {
                                var $status = full['status'];

                                return (
                                    '<span class="badge badge-pill ' +
                                    statusObj[$status].class +
                                    '" text-capitalized>' +
                                    statusObj[$status].text +
                                    '</span>'
                                );
                            }
                        },
                        {{--{--}}
                        {{--    // Avatar image/badge, Name and post--}}
                        {{--    targets: 5,--}}
                        {{--    render: function (data, type, full, meta) {--}}
                        {{--        var $end_date = full['end_at'];--}}
                        {{--       --}}{{--console.log({{date('d-m-Y', strtotime(+$categories+))}})--}}

                        {{--        // $name = full['market_name'];--}}
                        {{--        if ($end_date) {--}}
                        {{--            // For Avatar image--}}
                        {{--            var $output1=''--}}
                        {{--            function formatDate(date) {--}}
                        {{--                var d = new Date(date),--}}
                        {{--                    month = '' + (d.getMonth() + 1),--}}
                        {{--                    day = '' + d.getDate(),--}}
                        {{--                    year = d.getFullYear();--}}

                        {{--                if (month.length < 2) month = '0' + month;--}}
                        {{--                if (day.length < 2) day = '0' + day;--}}

                        {{--                return [year, month, day].join('-');--}}
                        {{--            }--}}

                        {{--                // console.log($category)--}}
                        {{--                $output1  += '<span >' +--}}
                        {{--                    formatDate($end_date) +--}}
                        {{--                '</span>';--}}
                        {{--           }--}}
                        {{--        else {--}}
                        {{--            $output1  += '<span > {{__("Not Found")}}</span>'--}}
                        {{--        }--}}

                        {{--        var $row_output =''+--}}
                        {{--            $output1 ;--}}
                        {{--        return $row_output;--}}
                        {{--    }--}}
                        {{--},--}}





                        {
                            // Actions
                            targets: -1,
                            title: 'Actions',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="d-inline-flex">' +
                                    '<a class="pr-1 dropdown-toggle hide-arrow text-primary" data-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
                                    '</a>' +
                                    '<div class="dropdown-menu dropdown-menu-right">' +
                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'" class="dropdown-item delete-record">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
                                    'Delete</a>' +
                                    '</div>' +
                                    '</div>' +
                                    '<a href="{{ route('order.show','')}}'+"/"+full.id+'"  class="item-edit">' +
                                    feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'
                                );
                            }
                        }
                    ],
                    order: [[1, 'desc']],
                    dom:  "<'row'<'col-sm-2'l><'col-sm-7'B><'col-sm-2'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
                        {
                            text: feather.icons['trash-2'].toSvg({ class: 'mr-50 font-small-4' })+'{{__('Delete')}}' ,
                            className: 'delete_all btn btn-success',
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
    {{--    Add new Coupon--}}


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
                        url: "{{ url("order/delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                swal.fire("Done!",
                                    ' @if(App::isLocale('en'))'+
                                    response.message_en
                                    +'@else
                                        '+response.message_ar
                                    +'@endif', "success");
                                $('.datatables-basic').DataTable().ajax.reload();

                            } else {
                                swal.fire("Error!",
                                    ' @if(App::isLocale('en'))'+
                                    response.message_en
                                    +'@else
                                        '+response.message_ar
                                    +'@endif', "error");
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
                            url: "{{ route('order.delete_all') }}",
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,
                            success: function (response) {

                                if (response.status === true) {
                                    swal.fire("Done!", '@if(App::isLocale('en'))'+response.message_en +'@else'+ response.message_ar +' @endif', "success");
                                    $('.datatables-basic').DataTable().ajax.reload();

                                } else {
                                    swal.fire("Error!", '@if(App::isLocale('en'))'+response.message_en +'@else'+ response.message_ar
                                        +'@endif', "error");
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

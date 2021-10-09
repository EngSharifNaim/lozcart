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
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">


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
                            <h2 class="content-header-title float-left mb-0">{{__('Coupons')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Coupons')}}
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
                                    @can('Create Coupons')
                                    <div class="dt-action-buttons text-right">
                                        <div class="dt-buttons">
                                            <button class="dt-button create-new btn btn-success" data-toggle="modal" data-target="#modals-slide-in" id="coupon_modal"  type="button" >
                                                <i data-feather="plus"></i>
                                                {{__('Add New Coupon')}}
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
                                        <th>{{__('Coupon')}}</th>
                                        <th>{{__('Discount Type')}}</th>
                                        <th>{{__('Sale End Date')}}</th>
                                        <th>{{__('Times Use')}}</th>
                                        @can('Suspended and Activate Coupons')
                                        <th>{{__('Status')}}</th>
                                        @endcan
                                        @canany(['Delete Coupons','Edit Coupons'])
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
                            <form class="add-new-record modal-content pt-0" id="addCoupon" method="POST" enctype="multipart/form-data">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('New Coupon')}}</h5>
                                </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="data" class="control-label">
                                                    {{__('Promo Code')}}
                                                    <span style="color: red">*</span>
                                                </label>
                                                <input required="" value="" id="code" type="text" name="code" class="form-control" placeholder="{{__('Promo Code')}}" aria-required="true">
                                            </div>
                                            <div class="form-group col-md-12">
{{--                                                    <label for="select-country1">{{__('Category')}}</label>--}}
                                                <select class="select2  form-control" name="type" id="type">
                                                    @foreach($type_coupons as $item)
                                                        <option value="{{ $item->id}}" >
                                                            @if(App::isLocale('en'))
                                                                {{$item->name}}
                                                            @else
                                                                {{$item->name_ar}}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">

                                                <input required="" value="" id="discount" type="number" name="discount" class="form-control" placeholder="{{__('Discount')}}" aria-required="true">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label for="fp-default">{{__('Sale End Date')}}<span style="color: red">*</span></label>
                                                <input type="text" name="end_at"  id="datepicker"placeholder="{{__('Sale End Date')}}" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">

{{--                                                <input type="text" name="end_at" id="fp-default" class="form-control flatpickr-basic" placeholder="{{__('Sale End Date')}}" />--}}
                                            </div>

                                            <div class="form-group col-md-12">
                                            <label for="select-country1">{{__('Are discounted products excluded?')}}</label>
                                                <select class="select2  form-control" name="is_except_offers" id="is_except_offers">

                                                        <option value="1" >{{__('Yes')}}</option>
                                                        <option value="2" >{{__('No')}}</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">

                                                <input required="" value="" id="min_order_grand_total" type="number" name="min_order_grand_total" class="form-control" placeholder="{{__('Minimum amount of purchases')}}" aria-required="true">
                                            </div>
                                            <div class="form-group col-md-12">

                                                <input required="" value="" id="uses_times_for_user" type="number" name="uses_times_for_user" class="form-control" placeholder="{{__('The number of uses per customer')}}" aria-required="true">
                                            </div>
                                            <div class="form-group col-md-12">

                                                <input required="" value="" id="countuse" type="number" name="countuse" class="form-control" placeholder="{{__('The number of times the total use')}}" aria-required="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="add_coupon"  type="button" class=" btn btn-success waves-effect waves-light">
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
                    ajax: "{{route('coupon.get_coupons')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'code' },
                        { data: 'type' },
                        { data: 'end_at' },
                        { data: 'count_use' },
                            @can('Suspended and Activate Coupons')
                        { data: '' },
                            @endcan
                            @canany(['Delete Coupons','Edit Coupons'])
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
                            targets: 6,
                            orderable: false,
                        },
                        {
                            // Avatar image/badge, Name and post
                            targets: 5,
                            render: function (data, type, full, meta) {
                                var $end_date = full['end_at'];
                               {{--console.log({{date('d-m-Y', strtotime(+$categories+))}})--}}

                                // $name = full['market_name'];
                                if ($end_date) {
                                    // For Avatar image
                                    var $output1=''
                                    function formatDate(date) {
                                        var d = new Date(date),
                                            month = '' + (d.getMonth() + 1),
                                            day = '' + d.getDate(),
                                            year = d.getFullYear();

                                        if (month.length < 2) month = '0' + month;
                                        if (day.length < 2) day = '0' + day;

                                        return [year, month, day].join('-');
                                    }

                                        // console.log($category)
                                        $output1  += '<span >' +
                                            formatDate($end_date) +
                                        '</span>';
                                   }
                                else {
                                    $output1  += '<span > {{__("Not Found")}}</span>'
                                }

                                var $row_output =''+
                                    $output1 ;
                                return $row_output;
                            }
                        },

                            @can('Suspended and Activate Coupons')
                        {
                            // Actions
                            targets: -2,
                            title: '{{__('Status')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<div class="custom-control custom-switch custom-switch-success">' +
                                    '<input type="checkbox" class="custom-control-input" onclick="changeStatus(event,'+full.id+')" value="'+full.status+'" id="status-'+full.id+'" ' +
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
                            @canany(['Delete Coupons','Edit Coupons'])

                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '@can('Delete Coupons')' +
                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'"  class="item-edit mr-1 ml-1">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'@endcan+
                                    '@can('Edit Coupons')' +
                                    '<a href="{{ route('coupon.edit','')}}'+"/"+full.id+'"  class="item-edit">' +
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
    {{--    Add new Coupon--}}

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

            $(document).on("click", "#add_coupon", function() {
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }

                    });
                    var postData = new FormData(this.form);
                    $('#add_coupon').html('');
                    $('#add_coupon').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('coupon.store')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#add_coupon').empty();
                            $('#add_coupon').html('{{__('Save')}}');
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
                            document.getElementById("addCoupon").reset();
                            $('.datatables-basic').DataTable().ajax.reload();
                            $('.custom-error').remove();
                            $('#modals-slide-in').modal('hide');
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#add_coupon').empty();
                            $('#add_coupon').html('{{__('Save')}}');
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
{{--change status on row--}}

    <script type="text/javascript">


        function changeStatus(e,id) {
            e.preventDefault()
            swal.fire({
                title: "{{__('Warning')}}",
                text: "{{__('Please confirm approval')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes')}}",
                cancelButtonText: "{{__('No')}}",
                cancelButtonClass: 'btn-success',
                confirmButtonClass: 'btn-danger',
                reverseButtons: !0
            }).then(function (e) {
                if (e.value === true) {
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
                        url: "{{ url("coupon/status")}}" + '/' + id,
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
                            }, 200);
                            $('.datatables-basic').DataTable().ajax.reload();

                            // $('.datatables-basic').DataTable().ajax.reload();

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
                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }
    </script>
{{--    delete One Row--}}
    <script type="text/javascript">
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
                        url: "{{ url("coupon/delete/")}}/" + id,
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
                            url: "{{ route('coupon.delete_all') }}",
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
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script>

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd',
            minDate:new Date()

        });
    </script>
    <script>
        $(document).ready(function() {

            // $form = $('#form_data');
//             $(function () {
//                 'use strict';
//
//                 var addLozcart = $('#add_lozcart');
// // console.log(addClient)
//                 // jQuery Validation
//                 // --------------------------------------------------------------------
//                 if (addLozcart.length) {
//                     addLozcart.validate({
//
//                         // rules: {
//                         //     'street_address': {
//                         //         required: true,
//                         //     },
//                         //     'email': {
//                         //         required: true,
//                         //         email: true
//                         //     },
//                         //     password: {
//                         //         required: true,
//                         //         minlength: 9
//                         //     },
//                         //     'password_confirmation': {
//                         //         required: true,
//                         //         equalTo: '#password'
//                         //     },
//                         //     country_id: {
//                         //         required: true
//                         //     },
//                         //     mobile: {
//                         //         required: true,
//                         //         minlength: 10
//                         //     },
//                         //
//                         // }
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

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
                            <h2 class="content-header-title float-left mb-0">{{__('Pages')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Pages')}}
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
                                            <a href="{{route('page.create')}}" class="dt-button create-new btn btn-success"     >
                                                <i data-feather="plus"></i>
                                                {{__('Add New Page')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <table class="datatables-basic table" >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>id</th>
                                        <th>{{__('Page Title Arabic')}}</th>
                                        <th>{{__('Page Title English')}}</th>
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
                    ajax: "{{route('page.get_pages')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'title_ar' },
                        { data: 'title_en' },
                        { data: '' },
                        { data: '' },
                    ],
                    columnDefs: [
                        {
                            // For Responsive
                            className: 'control',
                            responsivePriority: 2,
                            targets: 0,
                            orderable: false,
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
                            targets: 3,
                            orderable: false,
                        },
                        {
                            targets: 4,
                            orderable: false,
                        },

                        {
                            // Actions
                            targets: -2,
                            title: '{{__('Status')}}',
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


                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (
                                    '<a href="http://market.lozcart.com/{{App::IsLocale('en')?'en':'ar'}}/'+'{{$market_now->link}}'+'/page/'+full.id+'" target="_blank"  class="item-edit ">' +
                                    feather.icons['eye'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'+
                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'"  class="item-edit mr-1 ml-1">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'+
                                    '<a href="{{ route('page.edit','')}}'+"/"+full.id+'"  class="item-edit">' +
                                    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
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
                        url: "{{ url("page/delete/")}}/" + id,
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
    {{--    update Status--}}
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
                url: "{{ url("page/status")}}" + '/' + id,
                type: "POST",
                data: {
                    status: status_new,
                    _token: token,

                },
                success: function (response) {
                    setTimeout(function () {
                        toastr['success'](
                            @if(App::isLocale('en'))
                                response.message_en,
                            @else
                                response.message_ar,
                                @endif
                            {
                                closeButton: true,
                                tapToDismiss: false
                            }
                        );
                    }, 200);

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
                            url: "{{ route('page.delete_all') }}",
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

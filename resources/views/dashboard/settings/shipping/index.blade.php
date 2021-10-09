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
        <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">

        <style>
            .dropify-wrapper .dropify-message p {
                font-size: 17px;
            }
        </style>
        @if(App::isLocale('en'))
    @else

    @endif
    <style>
        .modal .modal-header {
            background-color: #096d3e !important;
        }
        .modal-title{
            color: #ffffff;
        }
        .modal-slide-in .modal-dialog.sidebar-sm {
            width: 40rem !important;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Shipping Methods')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Shipping Methods')}}
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
                                                {{__('Add New Shipping Method')}}
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
                                        <th>{{__('Country')}}</th>
                                        <th>{{__('Delivery time')}}</th>
                                        <th>{{__('Price')}}</th>
                                        <th>{{__('Order Count')}}</th>
{{--                                        @can('Suspended and Activate Client')--}}
                                            <th>{{__('Status')}}</th>
{{--                                        @endcan--}}
{{--                                        @canany(['Delete Client','Edit Client'])--}}
                                            <th>{{__('Action')}}</th>
{{--                                        @endcanany--}}
                                    </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form class="add-new-record modal-content pt-0" id="add_shipping" method="POST" enctype="multipart/form-data">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('New Shipping Method')}}</h5>
                                </div>
                              <div class="modal-body flex-grow-1">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="title_ar" class="control-label">
                                                  {{__('Shipping Method Name Ar')}}
                                                  <span style="color: red">* </span>
                                              </label>
                                              <input required="" value="" id="name_ar" type="text" name="name_ar" class="form-control" placeholder="مندوبي الخاص ، سمسا ..." aria-required="true">
                                          </div>
                                      </div>
                                      @if(in_array('en',$language))
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="field-2" class="control-label">{{__('Shipping Method Name En')}}
                                                  <span style="color: red"> * </span>
                                              </label>
                                              <input required="" value="" id="name" type="text" name="name" class="form-control" placeholder="Special marketer, samsa..." aria-required="true">
                                          </div>
                                      </div>
                                      @endif
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="field-2" class="control-label">{{__('Shipping charges')}}
                                                  <span style="color: red"> * </span>
                                              </label>
                                              <div class="input-group ">
                                                  <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    {{App::isLocale('en')?$country_store->country->currency_short:$country_store->country->currency_short_ar}}
                                                                </span>
                                                  </div>
                                                  <input required="" type="number"  class="form-control" name="price" id="price" placeholder="0" onkeypress="isInputNumber(event,this.value)" aria-label="Username" aria-describedby="basic-addon1">
                                              </div>
{{--                                              <input required="" value="" id="price" name="price" class="form-control" placeholder="0" type="text" onkeypress="isInputNumber(event,this.value)" aria-required="true">--}}
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" name="paiement_when_receiving" class="custom-control-input" id="paiement_when_receiving">
                                                  <label class="custom-control-label" for="paiement_when_receiving">
                                                      {{__('Activate payment when receiving')}}
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-12" id="delivery_cost_block" style="display: none">
                                          <div class="form-group">
                                              <label for="field-2" class="control-label">{{__('The cost of payment upon receipt')}}</label>
                                              <input value="" id="cash_delivery_cost" type="text" name="cash_delivery_cost" class="form-control" placeholder="{{__('This amount will appear to the customer when choosing to pay on receipt')}}" onkeypress="isInputNumber(event,this.value)">
                                          </div>
                                      </div>
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="delivery_time_ar" class="control-label">
                                                  {{__('Expected time for shipment Ar')}}
                                                  <span style="color: red"> * </span>
                                              </label>
                                              <textarea required="" id="delivery_time_ar" type="text" name="delivery_time_ar" class="form-control" placeholder="التسليم المتوقع 3أيام عمل " aria-required="true"></textarea>
                                          </div>
                                      </div>
                                      @if(in_array('en',$language))
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="delivery_time_ar" class="control-label">
                                                  {{__('Expected time for shipment En')}}
                                                  <span style="color: red"> * </span>
                                              </label>

                                              <textarea required="" id="delivery_time" type="text" name="delivery_time" class="form-control" placeholder=" within 3 days" aria-required="true"></textarea>
                                          </div>
                                      </div>
                                      @endif
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="country" class="control-label">
                                                  {{__('Countries')}}
                                                  <span style="color: red"> * </span>
                                              </label>
                                              <select required class="select2 w-100" multiple name="country_id[]" id="country_id_modal">
                                                  <option value="all">{{__('All Countries')}}</option>
                                              </select>
                                          </div>
                                      </div>
{{--                                      <div class="col-md-12" id="all_cities_dev" style="display: block">--}}
{{--                                          <div class="form-group">--}}
{{--                                              <label for="country" class="control-label">--}}
{{--                                                  {{__('Cities')}}--}}
{{--                                                  <span style="color: red"> * </span>--}}
{{--                                              </label>--}}
{{--                                              <select class="select2 w-100" name="city[]" multiple id="city_id">--}}

{{--                                              </select>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}
{{--                                      <div class="col-md-12" id="cities_dev" style="display: none">--}}
{{--                                          <div class="form-group">--}}
{{--                                              <label for="field-2" class="control-label">المدن التى يشملها الشحن <a style="color: red">--}}
{{--                                                      * </a></label>--}}
{{--                                              <input type="text" style="border-bottom:0;" class="  search-query form-control" placeholder="ابحث عن المدينة ">--}}

{{--                                              <div id="cities_checks"></div>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}
                                  </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="addShipping"  type="button" class=" btn btn-success waves-effect waves-light">
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
{{--    <script src="https://mapp.sa/cPanel/libs/dropzone/dropzone.min.js"></script>--}}
{{--    <script src="https://mapp.sa/cPanel/js/cropper.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>--}}
{{--    --}}{{--    <script src="{{asset('')}}app-assets/js/scripts/tables/table-datatables-basic.js"></script>--}}

    {{--    <script src="{{asset('')}}app-assets/custom/staff.js"></script>--}}
    <!-- END: Page JS-->
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            if ($('#paiement_when_receiving').is(":checked")) {--}}
{{--                console.log(45454)--}}
{{--                // $('#delivery_cost_block').attr('required','required');--}}
{{--                $('#delivery_cost_block').show();--}}
{{--            } else {--}}
{{--                console.log(456)--}}
{{--                // $('#delivery_cost_block').removeAttr('required');--}}
{{--                $('#delivery_cost_block').hide();--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
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
                    ajax: "{{route('shipping.get_shipping')}}",
                    columns: [
                        { data: 'id' },
                        { data: 'id' },
                        { data: 'id' }, // used for sorting so will hide this column
                        { data: 'name' },
                        { data: 'country' },
                        @if(App::isLocale('en'))
                            { data: 'delivery_time' },
                        @else
                        { data: 'delivery_time_ar' },
                        @endif
                        { data: 'price' },
                        { data: 'order_count' },
                        { data: '' },
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
                            targets: 3,
                            orderable: false,
                            responsivePriority: 4,
                            render: function (data, type, full, meta) {
                                var $user_img = full['image'],
                                    @if(App::isLocale('en'))
                                    $name = full['name'];
                                @else
                                    $name = full['name_ar'];
                                @endif
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
                            targets: 4,
                            orderable: false,
                            render: function (data, type, full, meta) {
                                var $country = full['country'];
                                // console.log('co'+$country)


                                // $name = full['market_name'];
                                if ($country )   {
                                    console.log($country)
                                    // For Avatar image
                                    var $output1=''
                                    // $.each($countries, function (i, option) {
                                        // var $country=option.name_ar
                                        // console.log($category)
                                        $output1  +=
                                        {{--    '<span >' +--}}
                                        {{--    @if(App::isLocale('en')) $country.name @else $country.name_ar @endif +--}}
                                        {{--'</span>';--}}
                                        '<div class="avatar-group">'+

                                        '</div>';
                                    $( $country ).each(function(val, text) {
                                        $(".avatar-group").append(
                                            '<div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="" class="avatar pull-up my-0" data-original-title="'+text.name+'">'+
                                            '<img src="{{ env('ATTACH_URL_ADMIN').'countries/'}}'+text.flag+'"  alt="Avatar" height="26" width="26">'+
                                            '</div>'
                                        );
                                    });
                                    {{--'<div class="d-flex justify-content-left align-items-center">'+--}}
                                    {{--    '<div class="avatar  mr-1">'+--}}
                                    {{--        '<img src="{{asset('uploads/countries/').'/'}}'+$country.flag+'" alt="Avatar" width="32" height="32">'+--}}
                                    {{--        // <span class="avatar-content">O</span>--}}
                                    {{--    '</div>'+--}}
                                    {{--    '<div class="d-flex flex-column">'+--}}
                                    {{--        '<span class="emp_name text-truncate font-weight-bold">'+--}}
                                    {{--        @if(App::isLocale('en')) $country.name @else $country.name_ar @endif+--}}
                                    {{--    '</span>'+--}}
                                    {{--    '</div>'+--}}
                                    {{--'</div>';--}}
                                        // $output1  += ',';
                                    // });
                                    // console.log($output1);
                                }

                                if ($country.length ==0){
                                    $output1  = '<span > {{__("All Countries")}}</span>'
                                }

                                // var colorClasss = $country === '' ? ' bg-light-' + $state + ' ' : '';
                                var $row_output =''+
                                    $output1 ;
                                return $row_output;
                            }
                        },
                        {
                            targets: 5,
                            orderable: false,
                        },
                        {
                            targets: 6,
                            orderable: false,
                        },
                        {
                            targets: 7,
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
                                    '<input type="checkbox" class="custom-control-input" onclick="changeStatus(event,'+full.id+')" value="'+full.status+'" id="status-'+full.id+'" ' +
                                    (full.status == 1 ? 'checked': '') +
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


                        {
                            // Actions
                            targets: -1,
                            title: '{{__('Actions')}}',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                return (

                                    '<a href="javascript:;"  onclick="deleteRow('+full.id+')"  data-value="'+full.id+'"  class="item-edit mr-1 ml-1">' +
                                    feather.icons['trash-2'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'+
                                    '<a href="{{ route('shipping.edit','')}}'+"/"+full.id+'"  class="item-edit">' +
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
    {{--    Add new Shipping--}}

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

            $(document).on("click", "#addShipping", function() {
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
                    $('#addShipping').html('');
                    $('#addShipping').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('shipping.store')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#addShipping').empty();
                            $('#addShipping').html('{{__('Save')}}');
                            // Toast.fire({
                            //     type: 'success',
                            //     title: response.success
                            // });
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            document.getElementById("add_shipping").reset();
                            // $('.datatables-basic').DataTable().ajax.reload();
                            $('.custom-error').remove();
                            $('#modals-slide-in').modal('hide');
                            location.reload();
                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#addShipping').empty();
                            $('#addShipping').html('{{__('Save')}}');
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
                        url: "{{ url("shipping/delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                @if(App::isLocale('en'))
                                swal.fire("Done!", response.massage_en, "success");
                                @else
                                swal.fire("Done!", response.massage_ar, "success");
                                @endif
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
{{--    change status--}}

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
                        url: "{{ url("shipping/status")}}" + '/' + id,
                        type: "POST",
                        data: {
                            status: status_new,
                            _token: token,

                        },
                        success: function (response) {
                            setTimeout(function () {
                                toastr['success'](
                                    @if(App::isLocale('en'))
                                        response.massage_en,
                                    @else
                                        response.massage_ar,
                                        @endif
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
                            url: "{{ route('shipping.delete_all') }}",
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


{{--    show and hide input --}}
    <script>
        $('#paiement_when_receiving').on("change",function ()
        {
            if ($('#paiement_when_receiving').is(":checked")){
                $('#delivery_cost_block').show();
            }else {
                $('#delivery_cost_block').hide();
            }
        });

    </script>
{{--    validate is number--}}
    <script>
        function isInputNumber(evt, value) {

            var ch = String.fromCharCode(evt.which);

            if (!(/[0-9.]/.test(ch))) {
                evt.preventDefault();
            }

        }
    </script>
    {{--    get countries in modal--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#country_id_modal').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}}, flag: "{{$country->flag}}", text: '{{ App::isLocale('en')?$country->name:$country->name_ar}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];
            function formatCountry(country) {
                if (!country.id) { return country.text; }
                var $country = $(
                    {{--'<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+--}}
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
    {{--    on change country get cities--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            cities();--}}
{{--            $(document).on('change', '#country_id_modal', function() {--}}
{{--                cities();--}}
{{--                return false;--}}
{{--            });--}}
{{--            // $(document).on('change', '#city_id', function() {--}}
{{--            //     area();--}}
{{--            //     return false;--}}
{{--            // });--}}
{{--            function cities() {--}}
{{--                $('option', $('#city_id')).remove();--}}
{{--                $('#city_id').append($('<option></option>').val('').html(' --- '));--}}
{{--                var countryIdVal = $('#country_id_modal').val() != null ? $('#country_id_modal').val() : '{{ old('country_id_modal') }}';--}}
{{--                $.get("{{ route('shipping.get_cities') }}", { country_id: countryIdVal }, function (data) {--}}
{{--                    $.each(data, function(val, text) {--}}
{{--                        // console.log(text.name)--}}
{{--                        var selectedVal = val == '{{ old('city_id') }}' ? "selected" : "";--}}
{{--                        @if(App::isLocale('en'))--}}
{{--                        $('#city_id').append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name));--}}
{{--                        @else--}}
{{--                        $('#city_id').append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name_ar));--}}
{{--                        @endif--}}
{{--                    })--}}
{{--                }, "json");--}}
{{--            }--}}

{{--        });--}}
{{--    </script>--}}
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

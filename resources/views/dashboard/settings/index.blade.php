@extends('dashboard.layouts.app')
@section('style')
    <script type="text/javascript">
        // Notice how this gets configured before we load Font Awesome
        window.FontAwesomeConfig = { autoReplaceSvg: false }
    </script>

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

        <style>
            .setting-item i {
                font-size: 40px;
                line-height: 1;
                min-height: 50px;
            }


            .setting-item {
                text-align: center;
                justify-content: center;
                opacity: 0.8;
            }

            .setting-item:hover {

                opacity: 1;
            }
            .icon_paymmment {
                text-align: center;
            }
            .icon_paymmment > img {
                margin: auto;
                max-width: 100%;
            }
            .modal .modal-header {
                background-color: #28c76f !important;
            }
            .modal-title{
                color: #ffffff;
            }
            .card-text{
                color: #096d3e;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Settings')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Settings')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">{{__('Basic settings')}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- block -->
                    </div>

                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <a href="{{route('setting.store')}}">
                                <div class="card card-body setting-item" style="height: 210px;">

                                    <i class="dripicons-store gradual-icon text-success"></i>

                                    <h5 class="card-title"> {{__('Store settings')}}</h5>
                                    <p class="card-text">{{__('Logo, name, description')}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">

                            <a href="{{route('payment.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="far fa-credit-card text-success"></i>
                                    <h5 class="card-title">{{__('payment methods')}}</h5>
                                    <p class="card-text">{{__('Activating the payment gateway and bank accounts')}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">
                            <a href="{{route('shipping.index')}}">
                                <div class="card card-body setting-item " style="height: 210px;">
                                    <i class="fas fa-truck text-success"></i>
                                    <h5 class="card-title">{{__('Shipping and delivery')}}</h5>
                                    <p class="card-text">{{__('Activate shipping and delivery options')}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">
                            <a href="{{route('profile.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="far fa-user text-success"></i>
                                    <h5 class="card-title">{{__('Account settings')}}</h5>
                                    <p class="card-text"> {{__('Modify account information')}} </p>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="page-title-box">
                        <h4 class="page-title">{{__('Other settings')}}</h4>
                    </div>

                    <div class="row">

                        <div class="col-lg-3 col-6">
                            <a href="{{route('design.index')}}" id="design_card">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="fas fa-laptop-code text-success"></i>
                                    <h5 class="card-title">{{__('Store design')}}</h5>
                                    <p class="card-text">{{__('Colors, banners, customer reviews')}}</p>
                                </div>
                            </a>
                        </div>

{{--                        <div class="col-lg-3 col-6">--}}
{{--                            <a href="javascript:void(0)" data-toggle="modal" data-target="#editTax">--}}
{{--                                <div class="card card-body setting-item" style="height: 210px;">--}}
{{--                                    <i class="far fa-file-alt text-success"></i>--}}
{{--                                    <h5 class="card-title">{{__('Tax')}}</h5>--}}
{{--                                    <p class="card-text">{{__('Tax settings')}}</p>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}




                        <div class="col-lg-3 col-6">
                            <a href="{{route('staff.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="fas fa-users text-success"></i>
                                    <h5 class="card-title">{{__('Staff')}}</h5>
                                    <p class="card-text">{{__('Managing Staff')}}</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-6">
                            <a href="{{route('page.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="far fa-file text-success"></i>
                                    <h5 class="card-title">{{__('Introductory pages')}}</h5>
                                    <p class="card-text">{{__('Terms and Conditions and other pages')}}</p>
                                </div>
                            </a>
                        </div>


                        <div class="col-lg-3 col-6">


                            <a href="{{route('domain.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="dripicons-web text-success"></i>
                                    <h5 class="card-title">{{__('Custom domain')}}</h5>
                                    <p class="card-text">{{__('Domain reservation and preparation')}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">
                            <a href="{{route('plugins.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="fas fa-puzzle-piece text-success"></i>
                                    <h5 class="card-title">{{__('Connect services')}}</h5>
                                    <p class="card-text">{{__('Statistics, announcements, and chat')}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">
                            <a href="{{route('rate.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="far fa-star text-success"></i>
                                    <h5 class="card-title"> {{__('Ratings')}} </h5>
                                    <p class="card-text">{{__('Product and store ratings')}}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-6">
                            <a href="{{route('additional_setting.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">

                                    <i class="fas fa-sliders-h text-success"></i>

                                    <h5 class="card-title">{{__('Additional store settings')}} </h5>
                                    <p class="card-text">{{__('Minimum order, stop the store for maintenance')}}  </p>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-6">
                            <a href="{{route('country.index')}}">
                                <div class="card card-body setting-item" style="height: 210px;">
                                    <i class="fas fa-map-marked text-success"></i>
                                    <h5 class="card-title">{{__('Countries And Currencies')}}</h5>
                                    <p class="card-text">{{__('Manage the countries of the store and the currencies it supports')}}</p>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div id="editTax" class="modal fade me-custom-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">

                            <form id="tax" action="javascript:void(0)" method="POST" enctype="multipart/form-data">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{__('Value added tax')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-5 order-sm-12">
                                                        <div class="icon_paymmment">
                                                            <img src="{{asset('photo/333.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-7 order-sm-1">
                                                        <div class="custom-control custom-checkbox mb-2">
                                                            <input name="have_tax" {{$tax->have_tax??'' ==1?'checked':''}} type="checkbox" class="custom-control-input" id="have_tax">
                                                            <label class="custom-control-label" for="have_tax">
                                                                {{__('Activate the value-added tax')}}
                                                            </label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox mb-2">
                                                            <input name="is_tax_paid_by_merchant" type="checkbox" {{$tax->is_tax_paid_by_merchant??'' ==1?'checked':''}} class="custom-control-input" id="is_tax_paid_by_merchant">
                                                            <label class="custom-control-label" for="is_tax_paid_by_merchant">
                                                                {{__('The tax is borne by the merchant')}}
                                                                <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top"
                                                                                  title="{{__('The tax amount will appear in the order invoice without being calculated')}}" style="border-radius: 25px;">
                                                                        <i data-feather='alert-circle' ></i>
                                                                </span>
                                                            </label>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div id="tax_data_div" style="width:100%;display: none">
                                                <div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tax_name" class="control-label">
                                                                {{__('Tax Name')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <input type="text" value="{{$tax->tax_name ??''}}" class="form-control" id="tax_name" name="tax_name" placeholder="{{__('Tax Name')}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tax_percentage" class="control-label">
                                                                {{__('Tax rate%')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <input step="1" min="0" max="100" onchange="handleTaxPercentageChange(this);" name="tax_percentage" value="{{$tax->tax_percentage??''}}" type="number" class="form-control" id="tax_percentage" placeholder="{{__('Tax rate: 15%, for example')}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="tax_number" class="control-label">
                                                                {{__('Tax Number')}}
                                                                <a style="color: red"> * </a>
                                                            </label>
                                                            <input name="tax_number" value="{{$tax->tax_number??''}}" type="text" class="form-control" id="tax_number" placeholder="{{__('Tax Number')}}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="save_tax" class="btn btn-success bg-purple waves-effect waves-light">
                                            {{__('Save')}}</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div><!-- /.modal -->


                </div>
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
    {{--    <script src="{{asset('')}}app-assets/custom/staff.js"></script>--}}
    <!-- END: Page JS-->

    <script>
        function handleTaxPercentageChange(input) {
            if (input.value < 0) input.value = 0;
            if (input.value > 100) input.value = 100;
        }
    </script>
    <script>
        //check if is have_tax checked
        var have_tax = $('#have_tax');
        var tax_data_div = $('#tax_data_div');
        var paid_by_store = $('#paid_by_store');
        var tax_percentage = $('#tax_percentage');
        var tax_number = $('#tax_number');
        if (have_tax.prop('checked') === true) {
            tax_percentage.attr('required', true);
            tax_data_div.show();
            paid_by_store.show();
        } else {
            tax_percentage.removeAttr('required');
            tax_number.removeAttr('required');
            tax_data_div.hide();
            paid_by_store.hide();
        }

        have_tax.change(function () {
            if (have_tax.prop('checked') === true) {
                tax_percentage.attr('required', true);
                tax_data_div.show();
                paid_by_store.show();
            } else {
                tax_percentage.removeAttr('required');
                tax_number.removeAttr('required');
                tax_data_div.hide();
                paid_by_store.hide();
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
    $(document).on("click", "#save_tax", function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        var postData = new FormData(this.form);
        $('#save_tax').html('');
        $('#save_tax').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
            '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
        $.ajax({
            url: "{{ route('setting.save_update_tax')}}",
            type: "POST",
            data: postData,
            processData: false,
            contentType: false,
            success: function( response ) {
                $('#save_tax').empty();
                $('#save_tax').html('{{__('Save')}}');
                // Toast.fire({
                //     type: 'success',
                //     title: response.success
                // });
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
                // document.getElementById("tax").reset();
                $('.custom-error').remove();
                $('#editTax').modal('hide');

            },
            error: function (data) {
                $('.custom-error').remove();
                $('#save_tax').empty();
                $('#save_tax').html('{{__('Save')}}');
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
                        }, 2000);
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
    {{--change status on row--}}
    <script >

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
                cancelButtonClass: 'btn-primary',
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
                    cancelButtonClass: 'btn-primary',
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

@endsection

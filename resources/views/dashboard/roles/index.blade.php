@extends('dashboard.layouts.app')
@section('style')
    @if(App::isLocale('en'))
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
        <!-- END: Vendor CSS-->



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
                            <h2 class="content-header-title float-left mb-0">{{__('Roles')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Roles')}}
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
                                <table class="datatables-basic table" >
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- Modal to add new record -->
                    <div class="modal modal-slide-in fade" id="modals-slide-in">
                        <div class="modal-dialog sidebar-sm">
                            <form class="add-new-record modal-content pt-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-icon-default-fullname">Name</label>
                                        <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-icon-default-post">Post</label>
                                        <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-icon-default-email">Email</label>
                                        <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                                        <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                                        <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label" for="basic-icon-default-salary">Salary</label>
                                        <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />
                                    </div>
                                    <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
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
    <script src="../../../app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
{{--    <script src="../../../app-assets/js/scripts/tables/table-datatables-basic.js"></script>--}}
    <script src="../../../app-assets/custom/role.js"></script>
    <!-- END: Page JS-->

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
                        url: "{{ url("admin/roles/delete/")}}/" + id,
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
        // var dt_basic_table = $('.datatables-basic');
        // // var dt_basic = dt_basic_table.DataTable();
        // $('.datatables-basic tbody').on('click', '.delete-record', function () {
        //
        //
        //     dt_basic_table.row($(this).parents('tr')).remove().draw();
        // });
    </script>
    <script>
        // DataTable with buttons
        // --------------------------------------------------------------------
        var dt_basic_table = $('.datatables-basic');

    </script>
    {{--    ajax datatable--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}
{{--var assetPath = '../../../app-assets/';--}}
{{--            // DataTable--}}
{{--            $('#table_1').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax: assetPath + 'data/table-datatable.json',--}}

{{--                columns: [--}}
{{--                    // console.log(data);--}}
{{--                    { data: 'file_no' },--}}
{{--                    { data: 'name' },--}}
{{--                    { data: 'mobile' },--}}
{{--                    { data: 'age' },--}}
{{--                    { data: 'address' },--}}

{{--                    {--}}
{{--                        mRender: function ( data, type, row ) {--}}
{{--                            return'@can("patient-edit")<a class="btn btn-primary mr-1 ml-1" href="{{  route("patients.edit","")}}'+"/"+row.id+'">'+--}}
{{--                                '<i class="flaticon-settings-1"></i></a>'@endcan+--}}
{{--                                @can('patient-profile-public')--}}
{{--                                    '<a class="btn btn-warning mr-1 ml-1" href="{{ route('patient.profile.public','')}}'+"/"+row.id+'">{{__('Profile')}}</a>'+--}}
{{--                                @endcan--}}
{{--                                    @can('patient-delete')--}}
{{--                                    '<button id="delete" onclick="deleteConfirmation('+row.id+')" class="btn btn-danger mr-1 ml-1">'+--}}
{{--                                '<i class="flaticon-delete"></i></button>'+--}}
{{--                                @endcan--}}
{{--                                    '<form class="kt-form2 message_form mr-1 ml-1" id="message_form'+row.id+'" method="post" action="javascript:void(0)" style="display: inline-flex;" >'+--}}
{{--                                '@csrf'+--}}
{{--                                '<input type="text" value="'+row.id+'" name="patient_id" hidden>'+--}}
{{--                                '<button  type="submit" class="btn btn-dark"   id="message_form" >'+--}}
{{--                                '<i class="flaticon-mail-1"></i>'+--}}
{{--                                '</button></form>'+--}}
{{--                                '<form class="kt-form2 appointment_form mr-1 ml-1" id="appointment_form'+row.id+'" method="post" action="javascript:void(0)" style="display: inline-flex;" >'+--}}
{{--                                '@csrf'+--}}
{{--                                '<input type="text" value="'+row.id+'" name="patient_id" hidden>'+--}}
{{--                                '<button  type="submit" class="btn btn-success"   id="add_appointment" >'+--}}
{{--                                '{{__('Add Appointment')}}'+--}}
{{--                                '</button></form>'--}}
{{--                        }--}}
{{--                    }--}}
{{--                ]--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
@endsection

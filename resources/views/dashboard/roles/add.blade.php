@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">

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
                            <h2 class="content-header-title float-left mb-0">{{__('Create Role')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">{{__('Roles')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Create Role')}}
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
                                    <h4 class="card-title">{{__('Create Role')}}</h4>
                                </div>
                                <div class="card-body">
                                    <form id="mainAdd" method="post" action="javascript:void(0)">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="basic-default-name">{{__('Name')}}</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="{{__('Name')}}" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-default-name">{{__('Ar Name')}}</label>
                                            <input type="text" class="form-control" id="ar_name" name="ar_name" placeholder="{{__('Ar Name')}}" />
                                        </div>
                                        <div class="form-group">
                                            <fieldset>
                                                <legend style="width: 30%;" class="d-flex">
                                                    <div >
                                                        {{__('Permission')}}
                                                    </div>
                                                    <div class="custom-control custom-checkbox " style="margin-left: 5%;margin-right: 5%">
                                                        <input type="checkbox" class="custom-control-input "  id="checkAll"  />
                                                        <label class="custom-control-label" for="checkAll"> {{__('Check All')}}</label>
                                                    </div>


                                                </legend>
                                                <div class="row">
                                                    @foreach ($permissions as $permission)
                                                            <div class="box_permission col-md-3 mr-2 mb-2 mt-2 ml-2">
                                                                <ul>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input option_{{$permission->id}}" name="permission[]" id="option_{{$permission->id}}" value="{{$permission->id}}" />
                                                                            <label class="custom-control-label" for="option_{{$permission->id}}">
                                                                                <label class="custom-control-label" for="option_{{$permission->id}}">
                                                                                    @if(App::isLocale('en'))
                                                                                        {{$permission->name}}
                                                                                    @else
                                                                                        {{$permission->ar_name}}
                                                                                    @endif
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                        <ul>
                                                                            <li>
                                                                                <ul>
                                                                                    @foreach($permission->children as $child)
                                                                                        <li>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input type="checkbox" class="custom-control-input subOption_{{$permission->id}}" name="permission[]" id="customCheck_{{$child->id}}" value="{{$child->id}}" />
                                                                                                <label class="custom-control-label" for="customCheck_{{$child->id}}">
                                                                                                    @if(App::isLocale('en'))
                                                                                                        {{$child->name}}
                                                                                                    @else
                                                                                                        {{$child->ar_name}}
                                                                                                    @endif
                                                                                                </label>
                                                                                            </div>

                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                    @endforeach
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary " id="add_form" name="submit" value="Submit" >
                                                    {{__('Save')}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /jQuery Validation -->
                    </div>
                </section>
                <!-- /Validation -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
@section('Scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/custom/role-validation.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
        function deleteRole(id) {
            var idRow =document.getElementById("role_row_"+id)
            swal.fire({
                title: "حذف؟",
                text: "الرجاء التأكيد على الموافقة",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "نعم, اتم الحذف!",
                cancelButtonText: "لا,تراجع!",
                confirmButtonColor: "#DD6B55",
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
                                idRow.remove();

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
    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
    <script>
        $(document).ready(function () {
            var checkboxes = document.querySelectorAll('input[class*="subOption_"]'),
                checkall = document.querySelectorAll('input[id*="option_"]')
            for(var i=0; i<checkboxes.length; i++) {
                checkboxes[i].onclick = function() {

                    var current_class =this.classList[1].split("_")[1]
                    // var checkedCount = document.querySelectorAll('input.subOption:checked').length;
                    var  checkAll = document.getElementById('option_'+current_class);

                    var checkedCount = document.querySelectorAll('input[class*="subOption_'+current_class+'"]:checked').length;
                    console.log(checkedCount)
                    console.log(checkAll)

                    checkAll.checked = checkedCount > 0;
                    var checkBoxes = document.querySelectorAll('input[class*="subOption_'+current_class+'"]')
                    // $(document).ready(function () {
                    checkAll.indeterminate = checkedCount > 0 && checkedCount < checkBoxes.length;
                    // });
                }
            }
            for(var i=0; i<checkall.length; i++) {
                checkall[i].onclick = function() {
                    var current_class =this.id.split("_")[1]
                    var checkBoxes = document.querySelectorAll('input[class*="subOption_'+current_class+'"]')

                    for(var i=0; i<checkBoxes.length; i++) {
                        checkBoxes[i].checked = this.checked;
                    }
                }
            }

        });
    </script>
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

            $(document).on("click", "#add_form", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#add_form').html('');
                $('#add_form').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('roles.store')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_form').empty();
                        $('#add_form').html('{{__('Save')}}');
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
                        }, 2000);
                        document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#add_form').empty();
                        $('#add_form').html('{{__('Save')}}');
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
@endsection

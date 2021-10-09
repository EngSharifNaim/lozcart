@extends('dashboard.layouts.app')
@section('style')
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    {{--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">--}}


@endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    {{__('New User')}}
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon-home-2"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.users.index',1)}}" class="kt-subheader__breadcrumbs-link">
                        {{__('Users Page')}}
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{route('admin.users.create')}}" class="kt-subheader__breadcrumbs-link">
                        {{__('New User')}}
                    </a>


                </div>

                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
										<span><i class="flaticon2-search-1"></i></span>
									</span>
                </div>
            </div>
        </div>

        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">

                                    {{__('New User')}}

                                </h3>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="kt-form" id="mainAdd" method="post" action="javascript:void(0)" >
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="form-group">
                                    <label>{{__('Name')}}</label>
                                    <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="{{__('Enter')}} {{__('Name')}}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Mobile')}}</label>
                                    <input type="text" class="form-control"  name="mobile" value="{{ old('mobile') }}" placeholder="{{__('Enter')}} {{__('Mobile')}}">
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions text-center">
                                    <button id="add_form"   type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                </div>
                            </div>
                        </form>

                        <!--end::Form-->
                    </div>

                </div>

            </div>
        </div>

        <!-- end:: Content -->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Update Data
            const Toast = Swal.mixin({
                icon: 'success',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
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
                $('#add_form').html('{{__('Adding...')}}');
                $.ajax({
                    url: "{{ route('admin.users.store')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_form').html('{{__('Add')}}');
                        Toast.fire({
                            type: 'success',
                            title: response.success
                        });
                        document.getElementById("mainAdd").reset();
                        $('.custom-error').remove();
                        $('#blah').removeAttr('src');

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        var response = data.responseJSON;
                        if (data.status == 422) {
                            if (typeof(response.responseJSON) != "undefined") {
                                myHandel(response);
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message
                                });
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

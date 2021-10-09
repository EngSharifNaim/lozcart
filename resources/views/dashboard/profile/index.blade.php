@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <style>
        .modal-slide-in .modal-dialog.sidebar-sm {
            width: 55rem !important;
        }
        .addressPlaceWrap {
            display: flex;
            margin-bottom: 1rem;
        }
        .addressPlaceWrap .placeActived {
            background-color: #233 !important;
            color: #fff;
            border-color: #233 !important;
            box-shadow: none !important;
        }
        #map {
            width: 100% !important;
            height: 250px !important;
            position: relative !important;
            overflow: hidden !important;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Account settings')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Account settings')}}
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
                                    <h4 class="card-title">{{__('Edit Account settings')}}</h4>
                                </div>
                                <div class="card-body">

                                        <div class="col-md-12">
                                            <form id="editData">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="name" class="control-label">
                                                            {{__('Name')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <input required="" value="{{$user->owner_name}}" id="owner_name" type="text" name="owner_name" class="form-control" placeholder="{{__('Name')}}" aria-required="true">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name" class="control-label">
                                                            {{__('Email')}}
                                                            <span style="color: red">*</span>
                                                        </label>
                                                        <input required="" value="{{$user->email}}" id="email" type="text" name="email" class="form-control" placeholder="{{__('Email')}}" aria-required="true">
                                                    </div>
                                                    <div class="form-row col-md-12">

                                                        <div class="form-group col-md-7">
                                                            <label for="mobile" class="control-label">
                                                                {{__('Mobile')}}
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <input required="" value="{{$user->mobile}}" id="mobile" type="text" name="mobile" class="form-control" placeholder="{{__('Mobile')}}" aria-required="true">
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="name" class="control-label " style="opacity: 0" >
                                                                {{__('country')}}
                                                                <span style="color: red">*</span>
                                                            </label>
                                                            <select class="select2 w-100" name="country_id" id="country_id">

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button id="edit_profile"  type="button" class=" btn btn-success waves-effect waves-light">
                                                            {{__('Save')}}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="col-md-12">
                                        <form id="updatePassword">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>
                                                        {{__('Password Update')}}
                                                        <span class="btn btn-dark p-0  waves-effect waves-float waves-light" data-toggle="tooltip" data-placement="top" title="{{__('At least 6 characters long')}}" style="border-radius: 25px;">
                                                                <i data-feather='alert-circle' ></i>
                                                            </span>
                                                        <span style="color: red">*</span>
                                                    </h4>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="password" class="control-label">{{__('Old Password')}}
                                                        <span style="color: red">*</span>
                                                    </label>
                                                    <input type="password" name="old_password" class="form-control" value="" placeholder="{{__('Old Password')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password" class="control-label">{{__('Password')}}
                                                        <span style="color: red">*</span>
                                                    </label>
                                                    <input type="password" name="password" class="form-control" value="" placeholder="{{__('New Password')}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password" class="control-label">{{__('Password confirmation')}}
                                                        <span style="color: red">*</span>
                                                    </label>
                                                    <input type="password" name="password_confirmation" class="form-control" value="" placeholder="{{__('Verify Password')}}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <button id="update_password"  type="button" class=" btn btn-success waves-effect waves-light">
                                                        {{__('Password Update')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->

{{--edit data Profile--}}
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

            $(document).on("click", "#edit_profile", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#edit_profile').html('');
                $('#edit_profile').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('profile.update',$user->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#edit_profile').empty();
                        $('#edit_profile').html('{{__('Save')}}');
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
                        // document.getElementById("editData").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#edit_profile').empty();
                        $('#edit_profile').html('{{__('Save')}}');
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

{{--    update password--}}
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

            $(document).on("click", "#update_password", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#update_password').html('');
                $('#update_password').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Updating')}}...</span>');
                $.ajax({
                    url: "{{ route('profile.update_password',$user->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#update_password').empty();
                        $('#update_password').html('{{__('Update Password')}}');
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
                        document.getElementById("updatePassword").reset();
                        $('.custom-error').remove();

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#update_password').empty();
                        $('#update_password').html('{{__('Update Password')}}');
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
{{--    get countries--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}}, selected: {{$country->id ==$user->country_id ?'true': 'false'}}, flag: "{{$country->flag}}", text: '{{ $country->name}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];
            var f =$('.select2');
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
                var $country = $(
                    '<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.key + '</span>'
                );
                {{--if (country.id == {{$user->country_id}}){--}}

                {{--    var data = {--}}
                {{--        "id": country.id,--}}
                {{--        "text": country.text,--}}
                {{--    };--}}
                {{--        console.log(data)--}}
                {{--    $('#country_id').trigger({--}}
                {{--        type: 'select2:select',--}}
                {{--        params: {--}}
                {{--            data: data--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}

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
    {{--    get countries in modal--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#country_id_modal').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}}, selected: {{$country->id ==$user->country_id ?'true': 'false'}}, flag: "{{$country->flag}}", text: '{{ $country->name}}',key:'{{ $country->key}}' },
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
                var $country = $(
                    '<img class=" flag-icon flag-icon-squared" src="{{asset('uploads/countries').'/'}}'+country.flag+'"/>'+
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.key + '</span>'
                );
                {{--if (country.id == {{$user->country_id}}){--}}

                {{--    var data = {--}}
                {{--        "id": country.id,--}}
                {{--        "text": country.text,--}}
                {{--    };--}}
                {{--        console.log(data)--}}
                {{--    $('#country_id').trigger({--}}
                {{--        type: 'select2:select',--}}
                {{--        params: {--}}
                {{--            data: data--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}

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

@endsection

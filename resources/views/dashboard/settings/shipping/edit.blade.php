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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Shipping Method')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('shipping.index')}}">{{__('Shipping Methods')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Shipping Method')}}
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
                                    <h4 class="card-title">{{__('Edit Shipping Method')}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form   enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title_ar" class="control-label">
                                                                {{__('Shipping Method Name Ar')}}
                                                                <span style="color: red">* </span>
                                                            </label>
                                                            <input required="" value="{{$choice->name_ar}}" id="name_ar" type="text" name="name_ar" class="form-control" placeholder="مندوبي الخاص ، سمسا ..." aria-required="true">
                                                        </div>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">{{__('Shipping Method Name En')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$choice->name}}" id="name" type="text" name="name" class="form-control" placeholder="Special marketer, samsa..." aria-required="true">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="field-2" class="control-label">{{__('Shipping charges')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <input required="" value="{{$choice->price}}" id="price" name="price" class="form-control" placeholder="0" type="text" onkeypress="isInputNumber(event,this.value)" aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="paiement_when_receiving" {{$choice->paiement_when_receiving == 1?'checked':''}} class="custom-control-input" id="paiement_when_receiving">
                                                                <label class="custom-control-label" for="paiement_when_receiving">
                                                                    {{__('Activate payment when receiving')}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" id="delivery_cost_block" {{$choice->paiement_when_receiving==0?'style=display:none':''}}>

                                                        <div class="form-group">
                                                            <label for="field-2" class="control-label">{{__('The cost of payment upon receipt')}}</label>
                                                            <input value="{{$choice->cash_delivery_cost}}" id="cash_delivery_cost" type="text" name="cash_delivery_cost" class="form-control" placeholder="{{__('This amount will appear to the customer when choosing to pay on receipt')}}" onkeypress="isInputNumber(event,this.value)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="delivery_time_ar" class="control-label">
                                                                {{__('Expected time for shipment Ar')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <textarea required="" id="delivery_time_ar" type="text" name="delivery_time_ar" class="form-control" placeholder="يصل  خلال  3 أيام " aria-required="true">{{$choice->delivery_time_ar}}</textarea>
                                                        </div>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="delivery_time_ar" class="control-label">
                                                                    {{__('Expected time for shipment En')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>

                                                                <textarea required="" id="delivery_time" type="text" name="delivery_time" class="form-control" placeholder=" within 3 days" aria-required="true">{{$choice->delivery_time}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="country" class="control-label">
                                                                {{__('Countries')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <select class="select2 w-100" name="country_id[]" multiple id="country_id_modal">
                                                                <option value="all"{{in_array('all',$choice->country_id)?'selected':''}}>{{__('All Countries')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
{{--                                                    <div class="col-md-12" id="all_cities_dev" style="display: block">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            <label for="country" class="control-label">--}}
{{--                                                                {{__('Cities')}}--}}
{{--                                                                <span style="color: red"> * </span>--}}
{{--                                                            </label>--}}
{{--                                                            <select class="select2 w-100" name="city[]" multiple id="city_id">--}}

{{--                                                            </select>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>

                                                <button id="edittShipping"  type="button" class=" btn btn-success waves-effect waves-light">
                                                    {{__('Save')}}
                                                </button>

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
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>

    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->

{{--edit data Shipping Method--}}
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

            $(document).on("click", "#edittShipping", function() {
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
                    $('#edittShipping').html('');
                    $('#edittShipping').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('shipping.update',$choice->id)}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#edittShipping').empty();
                            $('#edittShipping').html('{{__('Save')}}');
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
                            // document.getElementById("editData").reset();
                            $('.custom-error').remove();

                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#edittShipping').empty();
                            $('#edittShipping').html('{{__('Save')}}');
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
{{--    add new Address--}}
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

            $(document).on("click", "#addAddress", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#addAddress').html('');
                $('#addAddress').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('user.address_store',$choice->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#addAddress').empty();
                        $('#addAddress').html('{{__('Save')}}');
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
                        // document.getElementById("add_address").reset();
                        $('.datatables-basic').DataTable().ajax.reload();
                        $('.custom-error').remove();
                        $('#modals-slide-in').modal('hide');

                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#addAddress').empty();
                        $('#addAddress').html('{{__('Save')}}');
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
                    url: "{{ route('user.update_password',$choice->id)}}",
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

    {{--    get countries in modal--}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('#country_id_modal').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}}, flag: "{{$country->flag}}",selected: {{in_array($country->id,$choice->country_id) ?'true': 'false'}}, text: '{{ App::isLocale('en')?$country->name:$country->name_ar}}',key:'{{ $country->key}}' },
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
                placeholder: "{{__('Please Select a country')}}",
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
{{--        var cities_arr =[--}}
{{--            @foreach($choice_city as $item)--}}
{{--            {{$item}},--}}
{{--            @endforeach--}}
{{--        ];--}}
{{--        // console.log(cities_arr)--}}
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
{{--                        // console.log(text.id)--}}
{{--                        --}}{{--var selectedVal = val == '{{ old('city_id') }}' ? "selected" : "";--}}

{{--                        var selectedVal = cities_arr.includes(text.id)|| text.id=='all' ? "selected" : "";--}}
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

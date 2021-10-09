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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Bank Account')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('payment.index')}}">{{__('Payment Methods')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Bank Account')}}
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
                                    <h4 class="card-title">{{__('Edit Bank Account')}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form   enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="country" class="control-label">
                                                                {{__('Countries')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <select class="select2 w-100" name="country_id" id="country_id_modal">
                                                                {{--                                                  <option value="all">{{__('All Countries')}}</option>--}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" id="all_cities_dev" style="display: block">
                                                        <div class="form-group">
                                                            <label for="country" class="control-label">
                                                                {{__('Bank')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <select class="select2 w-100" name="bank_id"  id="bank_id">

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title_ar" class="control-label">
                                                                {{__('Account Holder Name Ar')}}
                                                                <span style="color: red">* </span>
                                                            </label>
                                                            <input required="" value="{{$bank_account->name_ar}}" id="name_ar" type="text" name="name_ar" class="form-control" placeholder="{{__('Account Holder Name Ar')}}" aria-required="true">
                                                        </div>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">{{__(' Account Holder Name En')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>
                                                                <input required="" value="{{$bank_account->name}}" id="name" type="text" name="name" class="form-control" placeholder="{{__(' Account Holder Name En')}}" aria-required="true">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="title_ar" class="control-label">
                                                                {{__('Account No')}}
                                                                <span style="color: red">* </span>
                                                            </label>
                                                            <input required="" value="{{$bank_account->account_no}}" id="account_no" type="number" name="account_no" onkeypress="isInputNumber(event,this.value)" class="form-control" placeholder="{{__('Account No')}}" aria-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="details_ar" class="control-label">
                                                                {{__('Account Details')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <textarea required="" id="details_ar" type="text" name="details_ar" class="form-control" placeholder="{{__('Account Details Ar')}}" aria-required="true">{{$bank_account->details_ar}}</textarea>
                                                        </div>
                                                    </div>
                                                    @if(in_array('en',$language))
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="details" class="control-label">
                                                                    {{__('Account Details En')}}
                                                                    <span style="color: red"> * </span>
                                                                </label>

                                                                <textarea required="" id="details" type="text" name="details" class="form-control" placeholder=" {{__('Account Details En')}}" aria-required="true">{{$bank_account->details}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="basic-addon2" class="control-label">
                                                                {{__('IBAN')}}
                                                                <span style="color: red"> * </span>
                                                            </label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon2"></span>
                                                                </div>
                                                                <input required="" value="{{$bank_account->iban}}" id="IBAN" type="text" name="iban" class="form-control IBAN" placeholder="{{__('IBAN')}}"  aria-describedby="basic-addon2" onkeypress="isInputNumber(event,this.value)" aria-required="true">
                                                            </div>
                                                        </div>
                                                    </div>

                                                      </div>

                                                <button id="editBankAccount"  type="button" class=" btn btn-success waves-effect waves-light">
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

{{--edit data bank Account--}}
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

            $(document).on("click", "#editBankAccount", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#editBankAccount').html('');
                $('#editBankAccount').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('payment.update',$bank_account->id)}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#editBankAccount').empty();
                        $('#editBankAccount').html('{{__('Save')}}');
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
                        $('#editBankAccount').empty();
                        $('#editBankAccount').html('{{__('Save')}}');
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
                { id: {{ $country->id}},selected: {{$country->id ==$bank_account->country_id ?'true': 'false'}}, text: '{{ $country->name}}',key:'{{ $country->key}}' },
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

    {{--    on change country get Banks--}}
    <script>
        var bank_arr =[
            {{$bank_account->bank_id}}
        ];
        // console.log(cities_arr)
        $(function () {
            banks();
            $(document).on('change', '#country_id_modal', function() {
                banks();
                return false;
            });
            // $(document).on('change', '#city_id', function() {
            //     area();
            //     return false;
            // });
            function banks() {
                $('option', $('#bank_id')).remove();
                $('#bank_id').append($('<option></option>').val('').html(' --- '));
                var countryIdVal = $('#country_id_modal').val() != null ? $('#country_id_modal').val() : '{{ old('country_id_modal') }}';
                $.get("{{ route('payment.get_banks') }}", { country_id: countryIdVal }, function (data) {
                    $.each(data.banks, function(val, text) {
                        // console.log(text.id)
                        {{--var selectedVal = val == '{{ old('city_id') }}' ? "selected" : "";--}}

                        var selectedVal = bank_arr.includes(text.id)|| text.id=='all' ? "selected" : "";
                        @if(App::isLocale('en'))
                        $('#bank_id').append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name));
                        @else
                        $('#bank_id').append($('<option ' + selectedVal + '></option>').val(text.id).html(text.name_ar));
                        @endif
                    })
                    $('#basic-addon2').empty().text(data.code);

                }, "json");
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
@endsection

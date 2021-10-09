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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dripicons/2.0.0/webfont.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA==" crossorigin="anonymous" />

    <style>
        .countrySettingsHead {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-left: 12px;
        }

        #addCountriesModal .modal-title, #addCurrenciesModal .modal-title {
            color: #fff;
        }

        .checkbox label {
            cursor: pointer;
        }

        .countrySettingItem {
            display: flex;
            align-items: center;
            padding: 20px 0;
            justify-content: space-between;
            border-bottom: 1px solid #f1f2f4;
        }


        .countrySettingItem .btn {
            padding: .35rem .9rem;
        }

        .countrySettingItem .setMain {
            background-color: transparent !important;
            background: transparent;
            color: #343a40 !important;
            border-color: #ced4da !important;
            margin: 0 0 0 .5rem;
        }

        .countrySettingItem .setMain:hover {
            background: linear-gradient(to left, rgba(111, 113, 205, 0.95) 0%, rgba(70, 72, 159, 0.95) 90%);
            border-color: rgba(111, 113, 205, 0.95) !important;
            color: #fff !important;
        }

        .countrySettingItem .mainCurrency {
            /* background-color: transparent !important;
            background: transparent;
            color: #343a40 !important;
            border: 0 !important; */
            pointer-events: none;
            margin-left: 34px;
        }

        .countrySettingItem .mainCurrency:hover,
        .countrySettingItem .mainCurrency:focus {
            border: 0;
            box-shadow: none;
            outline: none;
        }

        /* .countrySettingItem .countyOptionsList .deactiveCountry {
            background-color: #f1556c;
            color: #fff;
        }
        .countrySettingItem .countyOptionsList .activeCountry {
            background-color: #39d5ad;
            color: #fff;
        } */

        @media (max-width: 567px) {
            .countrySettingItem {
                flex-flow: column;
                align-items: flex-start;
            }

            .countrySettingItem .checkbox.checkbox-primary {
                margin-bottom: 1rem;
            }
        }

        .countrySettingItem .checkbox.checkbox-primary label::before {
            display: none;
        }

        .countrySettingItem .checkbox.checkbox-primary input {
            display: none;
        }

        .countriesSearchWrap {
            width: 100%;
            padding: 0 15px;
        }
        /*
                .countriesSearchWrap input {
                    background: #f1f5f7;
            border-color: #f1f5f7;
                } */

        .countriesSelectWrap {
            max-height: 300px;
            overflow-y: scroll;
            overflow-x: hidden;
            padding: 20px 15px;
        }

        .countriesSelectWrap::-webkit-scrollbar {
            width: 3px;
            height: 5px;
        }

        .countriesSelectWrap::-webkit-scrollbar-track {
            background: #ffffff;
            border-radius: 5px;
        }

        .countriesSelectWrap::-webkit-scrollbar-thumb {
            background:#46489ff2;
            border-radius: 5px;
            height: 10px;
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        .countriesSelectWrap::-webkit-scrollbar-thumb:hover {
            background: #46489ff2;
        }
        .btn-primary:hover:not(.disabled):not(:disabled) {
            box-shadow: 0 8px 25px -8px #096d3e;
        }
        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .countrySettingItem .setMain:hover {
            background: linear-gradient(to left, rgb(9 109 62) 0%, rgb(9 109 62) 90%);
            border-color: rgb(9 109 62) !important;
            color: #fff !important;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Countries And Currencies')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Countries And Currencies')}}
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

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="countrySettingsHead">
                                        <h4 class="header-title">{{__('Store Countries')}}</h4>
                                        <button data-toggle="modal" data-target="#addCountry" id="add_country_modal" class="btn btn-success bg-purple waves-effect waves-light">
                                            <i class=" mdi mdi-plus mr-1"></i>
                                            {{__('Add Country')}}
                                        </button>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            @foreach($countries_store as $item)
                                            <div class="col-md-12" id="row{{$item->id}}">
                                                <div class="countrySettingItem">
                                                    <div class="checkbox checkbox-primary form-check-block">
                                                        <input type="checkbox" checked="">
                                                        <label>
                                                            <img style="margin-left:5px;max-width:30px;" src="{{ env('ATTACH_URL_ADMIN').'countries/'.$item->country->flag}}">
                                                            {{App::isLocale('en')? $item->country->name:$item->country->name_ar}}
                                                            <span style="margin-right: 5px;font-size: smaller">
                                                                ({{App::isLocale('en')? $item->country->currency_short:$item->country->currency_short_ar}} )
                                                            </span>
                                                            @if ($item->is_main ==0)
                                                                @if ($item->status ==1)
                                                                <span style="padding: 4px;margin-right:10px;" class="badge badge-success">{{__('Active')}}</span>
                                                                @endif
                                                                @if ($item->status ==0)
                                                                    <span style="padding: 4px;margin-right:10px;" class="badge badge-danger">{{__('Suspended')}}</span>
                                                                @endif
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div style="display:flex;align-items:center;">
                                                        @if ($item->is_main ==1)
                                                            <a href="javascript:void(0)" class="btn btn-success mainCurrency">
                                                                <i class="fas fa-check"></i> {{__('Base currency')}}
                                                            </a>
                                                        @endif

                                                        @if ($item->is_main ==0 )
                                                                @if ($item->status==1)
                                                                    <a href="javascript:void(0)" class="btn btn-success setMain" onclick="setMain({{$item->id}})">
                                                                        {{__('Choose as the base currency')}}
                                                                    </a>
                                                                @endif


                                                                <div class="dropdown countyOptionsList">
                                                                    <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h3"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(24px, 27px, 0px);">
                                                                        <a  href="#" onclick="changeStatus({{$item->id}})" data-value="{{$item->status}}" id="status_{{$item->id}}" class="DoIt dropdown-item deactiveCountry">
                                                                            <i class="mdi mdi-stop"></i>
                                                                            @if ($item->status==1)
                                                                                {{__('Deactivate Country')}}
                                                                            @endif
                                                                            @if ($item->status==0)
                                                                                {{__('Activate Country')}}
                                                                            @endif
                                                                        </a>
                                                                        <a href="#" class="dropdown-item deactiveBtn" onclick="deleteRow({{$item->id}})" >
                                                                            <i class="mdi mdi-delete"></i>
                                                                            {{__('Delete')}}</a>
                                                                    </div>
                                                                </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="col-md-12" id="row23">--}}
{{--                                                <div class="countrySettingItem">--}}

{{--                                                    <div class="checkbox checkbox-primary form-check-block">--}}
{{--                                                        <input type="checkbox" checked="">--}}
{{--                                                        <label>--}}
{{--                                                            <img style="margin-left:5px;max-width:30px;" src="https://mapp.sa/uploads/countries/23.png"> الولايات المتحدة الأمريكية--}}
{{--                                                            <span style="margin-right: 5px;font-size: smaller">( د.أ )</span>--}}
{{--                                                            <span style="padding: 4px;margin-right:10px;" class="badge badge-success">مفعل</span>--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}

{{--                                                    <div style="display:flex;align-items:center;">--}}


{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!--/ Basic table -->



            </div>
        </div>
    </div>
    <div id="addCountry" class="modal fade me-custom-modal show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Add New Country')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="POST" enctype="multipart/form-data" id="add_paypal" novalidate="novalidate">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="control-label">
                                        {{__('Country')}}
                                        <span style="color: red">* </span>
                                    </label>
                                    <select class="select2 w-100" name="country_id" id="country_id">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" id="add_country" class="btn btn-success waves-effect waves-light">{{__('Save')}}</button>
                    </div>
                </form>
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
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>
    {{--    get countries --}}
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            var isoCountries = [
                    @foreach($countries as $country)
                    {{--<option value="{{ $country->id}}" >{{$country->name}}</option>--}}
                { id: {{ $country->id}},  flag: "{{$country->flag}}", text: '{{App::isLocale('en')? $country->name:$country->name_ar}}',key:'{{ $country->key}}' },
                // { id: 2, abbreviation: "us", text: 'United States' ,key:'+970'},
                @endforeach
            ];

            function formatCountry(country) {
                if (!country.id) { return country.text; }
                var $country = $(
                    '<img class=" flag-icon flag-icon-squared" src="{{env('ATTACH_URL_ADMIN').'countries/'.'/'}}'+country.flag+'"/>'+
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
                    '<img class=" flag-icon flag-icon-squared" src="{{env('ATTACH_URL_ADMIN').'countries/'.'/'}}'+country.flag+'"/>'+
                    // '<span class="flag-icon flag-icon-' + country.abbreviation + ' flag-icon-squared"></span>' +
                    '<span class="flag-text">' + country.text+ '</span>'
                );
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
    {{--    Add new Country--}}

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

            $(document).on("click", "#add_country", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var postData = new FormData(this.form);
                $('#add_country').html('');
                $('#add_country').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    url: "{{ route('country.store')}}",
                    type: "POST",
                    data: postData,
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        $('#add_country').empty();
                        $('#add_country').html('{{__('Save')}}');
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

                        $('.custom-error').remove();
                        $('#addCountry').modal('hide');
                        window.location.href = '{{route('country.index')}}';
                    },
                    error: function (data) {
                        $('.custom-error').remove();
                        $('#addBankAccount').empty();
                        $('#addBankAccount').html('{{__('Save')}}');
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
    {{--    delete One Row--}}
    <script type="text/javascript">
        function deleteRow(id) {
            var idRow =document.getElementById("row"+id)
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
                        url: "{{ url("country/delete/")}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (response) {

                            if (response.status === true) {
                                @if(App::isLocale('en'))
                                swal.fire("Done!", response.massage_en, "success");
                                @else
                                swal.fire("Done!", response.massage_ar, "success");
                                @endif
                                idRow.remove();
                                // $('.datatables-basic').DataTable().ajax.reload();

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

        // ev.allowSubmit = true;
        function changeStatus(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            // var x =$('#status_'+id).data('value');
            // console.log(x)
            // if (x == 1) {
            //     $('#status_'+id).attr('data-value','0')
            //     // document.getElementById("status_"+id).value = 0
            // }
            // if (x == 0) {
            //     $('#status_'+id).attr('data-value','1')
            //     // document.getElementById("status_"+id).value = 1
            // }
            var status_new = $('#status_'+id).data('value');
            console.log(status_new)
            var token = $('meta[name="csrf-token"]').attr('content');
            // var idRow = document.getElementById("user_row_" + id)

            $.ajax({
                url: "{{ url("country/status")}}" + '/' + id,
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
                    window.location.href = '{{route('country.index')}}';

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
    {{--    change setMain--}}
    <script type="text/javascript">

        // ev.allowSubmit = true;
        function setMain (id) {
            swal.fire({
                title: "{{__('Edit Main Currency')}}",
                text: "{{__('When modifying, please note that we will amend the prices of all products according to the currency of this country')}}",
                type: "error",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: "{{__('Yes, modified!')}}",
                cancelButtonText: "{{__('No, Cancel!')}}",
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

            var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ url("country/set_main")}}" + '/' + id,
                type: "POST",
                data: {
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
                    window.location.href = '{{route('country.index')}}';

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
@endsection

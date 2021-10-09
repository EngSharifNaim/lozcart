@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-ratings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/custom/custom.css')}}">
<style>
    .caret{
        position: absolute;
        z-index: 2222;
        left: 10px;
        top: 50%;
        width: 10px;
        height: 10px;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #6c757d;
        transform: rotate(90deg) translateY(-50%);
    }
    #dLabel{
        position:relative;
        text-align: right;
        background: #f2f5f7;
        border: 0;
        color: #6c757d;
        margin: 20px 10px -5px 23px;
        display: inline-block;
        min-width: 200px;
        position: relative;
    }
    .multi-level{
        box-shadow: rgba(198, 198, 198, 0.6) 0px 2px 10px 0px;
        position: absolute;
        will-change: transform;
        top: 0px;
        left: 0px;
        transform: translate3d(0px, 35px, 0px);
    }
    .dropdown-menu li {
        padding: 10px;
    }
    .dropdown-submenu {
        position: relative;
    }
    .dropdown-menu li a {
        color: #6c757d;
        width: 100%;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Ratings')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Ratings')}}
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
                            <div class="card cutomRateCard">
                                <div style="    max-width: 95%;">
                                    <div class="dropdown custom-dropdown-filter" style="float:left;">
                                        <a id="dLabel" role="button" data-toggle="dropdown" class="btn" data-target="#" href="javascript:void(0)"  aria-expanded="false">
                                            <i class="fas fa-filter" style="font-size:17px;margin-left:5px;"></i>
                                            {{__('filter')}}
                                            <span class="caret" ></span>
                                        </a>
                                        <form id="filteringForm" action="{{route('rate.filter')}}" method="GET">
                                            <button type="submit" style="display: none;"></button>
                                        </form>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu"  x-placement="bottom-start">
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="javascript:void(0)" data-value="" class="filtering">
                                                    {{__('Show All')}}
                                                </a>

                                            </li>  <li class="dropdown-submenu">
                                                <a tabindex="-1" href="javascript:void(0)" data-value="0" class="filtering">
                                                    {{__('Store Rate')}}
                                                </a>

                                            </li>

                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="javascript:void(0)" data-value="1" class="filtering">
                                                    {{__('Products Rate')}}
                                                </a>

                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body" id="rate_data">
                                    @include('dashboard.ajaxData.rating')
                                </div> <!-- end card-body-->
                            </div>
                        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                getMoreRate(page);
            });
            $('#search').on('keyup', function() {
                $value = $(this).val();
                getMoreRate(1);
            });
            $('#country').on('change', function() {
                getMoreRate();
            });
            $('#sort_by').on('change', function (e) {
                getMoreRate();
            });

            $('#salary_range').on('change', function (e) {
                getMoreRate();
            });
        });
        function getMoreRate(page) {
            var search = $('#search').val();
            // Search on based of country
            var selectedCountry = $("#country option:selected").val();
            // Search on based of type
            var selectedType = $("#sort_by option:selected").val();
            // Search on based of salary
            var selectedRange = $("#salary_range option:selected").val();
            $.ajax({
                type: "GET",
                data: {
                    'search_query':search,
                    'country': selectedCountry,
                    'sort_by': selectedType,
                    'range': selectedRange
                },
                url: "{{ route('rate.get_more_rate') }}" + "?page=" + page,
                success:function(data) {
                    $('#rate_data').html(data);
                }
            });
        }
    </script>
    @foreach($rates as $item)
    <script>
        $(function () {
            'use strict';

            var isRtl = $('html').attr('data-textdirection') === 'rtl',

                readOnlyRatings = $('.read-only-ratings-{{$item->id}}');




            // Read Only Ratings
            // --------------------------------------------------------------------
            if (readOnlyRatings.length) {
                readOnlyRatings.rateYo({
                    rating: {{$item->rate}},
                    rtl: isRtl
                });
            }

        });
    </script>
    @endforeach
{{--    delete Rate--}}
    <script >
        $(document).on('click', '.deleteBtn', function (e) {
            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });
            e.preventDefault();
            var id = $(this).data('id');
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
                    // title: "تأكيد عملية الحذف!",
                    // type: "warning",
                    // cancelButtonColor: '#c54b42',
                    // confirmButtonClass: 'btn btn-success',
                    // cancelButtonClass: 'btn btn-danger',
                    // buttonsStyling: true,
                    // cancelButtonText: 'إلغاء',
                    // confirmButtonText: "تأكيد!",
                    // showCancelButton: true
            }).then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{route('rate.delete','').'/'}}" + id,
                        success: function (data) {
                            if (data.status === 0) {
                                swal.fire({
                                    type: 'warning',
                                    icon: 'warning',
                                    @if(App::isLocale('en'))
                                    title: data.message_en,
                                    @else
                                    title: data.message_ar,
                                    @endif
                                    timer: 4000
                                });
                            } else {
                                const item = $('#item-' + id);
                                item.fadeOut(500);
                                item.remove();

                                swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    @if(App::isLocale('en'))
                                    title: data.message_en,
                                    @else
                                    title: data.message_ar,
                                    @endif
                                    timer: 2000
                                });
                            }
                        },
                        error: function (data) {
                            swal.fire({
                                type: 'warning',
                                icon: 'warning',
                                title: 'عذراً، حدث خلل أثناء عملية الحذف',
                                timer: 4000
                            });
                        }
                        /*error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }*/
                    });
                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            });

        });
    </script>
{{--    Activate And not activate rate--}}
    <script>
        $('.filtering').click(function(){
            var filter=$(this).data('value');
            $("<input />").attr("type", "hidden")
                .attr("name", "filter")
                .attr("value", filter)
                .appendTo("#filteringForm");
            $("#filteringForm").submit();
        });
        $(document).ready(function(e){
            $('.activate').click(function(e){
                var id=$(this).data('id');

                swal.fire({
                    title: '{{__('Do you want to activate this rate?')}}',
                        type: "warning",
                        cancelButtonColor: '#c54b42',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: true,
                        cancelTextColor: '#FFFFFF',
                        cancelButtonText: '{{__('Cancel')}}',
                        confirmButtonText: "{{__('Confirm !')}}",
                        showCancelButton: true
                }).then(function (e) {
                    if (e.value === true) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                method: "POST",
                                url: "rate/activate/" + id,
                                success: function (data) {
                                    console.log(data);
                                    if (data.status === 0) {
                                        swal.fire({
                                            type: 'error',
                                            icon: 'warning',
                                            @if(App::isLocale('en'))
                                            title: data.message_en,
                                            @else
                                            title: data.message_ar,
                                            @endif
                                            timer: 4000
                                        });
                                    } else {
                                        swal.fire({
                                            type: 'success',
                                            icon: 'success',
                                            @if(App::isLocale('en'))
                                            title: data.message_en,
                                            @else
                                            title: data.message_ar,
                                            @endif
                                            timer: 2000
                                        })
                                        @if(App::isLocale('en'))
                                        $('#status-' + id).text(data.status_en);
                                            @else
                                            $('#status-' + id).text(data.status_ar);
                                            @endif

                                    }
                                },
                                error: function (data) {
                                    swal.fire({
                                        type: 'error',
                                        icon: 'warning',
                                        title: 'عذراً، حدثت خلل أثناء العملية',
                                        timer: 4000
                                    });
                                }
                            });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                });

                })

            });
            $('.deactivate').click(function(e){
                var id=$(this).data('id');
                swal.fire({
                        title: '{{__('Would you like to disable this rate?')}}',
                        type: "warning",
                        cancelButtonColor: '#c54b42',
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: true,
                        cancelTextColor: '#FFFFFF',
                        cancelButtonText: '{{__('Cancel')}}',
                        confirmButtonText: "{{__('Confirm !')}}",
                        showCancelButton: true
                }).then(function (e) {
                    if (e.value === true) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                method: "POST",
                                url: "rate/deactivate/" + id,
                                success: function (data) {
                                    console.log(data);
                                    if (data.status === 0) {
                                        swal.fire({
                                            type: 'error',
                                            icon: 'warning',
                                            @if(App::isLocale('en'))
                                            title: data.message_en,
                                            @else
                                            title: data.message_ar,
                                            @endif
                                            timer: 4000
                                        });
                                    } else {
                                        swal.fire({
                                            type: 'success',
                                            icon: 'success',
                                            @if(App::isLocale('en'))
                                            title: data.message_en,
                                            @else
                                            title: data.message_ar,
                                            @endif
                                            timer: 2000
                                        })
                                        @if(App::isLocale('en'))
                                        $('#status-' + id).text(data.status_en);
                                        @else
                                        $('#status-' + id).text(data.status_ar);
                                        @endif
                                    }
                                },
                                error: function (data) {
                                    swal.fire({
                                        type: 'error',
                                        title: 'عذراً، حدثت خلل أثناء العملية',
                                        timer: 4000
                                    });
                                }
                            });
                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                });

            });


    </script>
@endsection

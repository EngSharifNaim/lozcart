@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .nav.nav-tabs .nav-link.active {
            position: relative;
            color: #096d3e;
        }
        .nav-tabs .nav-item .nav-link.active:after {
            background: -webkit-linear-gradient(
                120deg
                , #096d3e, rgb(9 109 62)) !important;
            background: linear-gradient(
                -30deg
                , #096d3e, rgb(9 109 62)) !important;
        }
    </style>
    @if (App::isLocale('en'))
        <style>
            .nav-tabs{
                float: right;
                margin-top: -15px;
            }

        </style>
    @else
        <style>
            .nav-tabs {
                float: left;
                margin-top: -15px;
            }
        </style>
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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Page')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('setting.index')}}">{{__('Settings')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('page.index')}}">{{__('Pages')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Page')}}
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
                                    <h4 class="card-title">{{__('Edit Page')}}</h4>
                                </div>
                                <div class="card-body">
                                    <form action="javascript:void(0)" id="SaveData" method="post">
                                        @if(in_array('en',$language))
                                            <ul class="nav nav-tabs tab-floated border-0">
                                                <li class="nav-item">
                                                    <a href="#pTitleAr" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                        {{__('Arabic')}}
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#pTitleEn" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                        {{__('English')}}
                                                    </a>
                                                </li>
                                            </ul>
                                        @endif
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="pTitleAr">
                                                <div class="form-group">
                                                    <label class="col-form-label">{{__('Title Ar')}} <span style="color: red"> * </span></label>
                                                    <input  type="text" value="{{$page->title_ar}}" class="form-control" placeholder="{{__('Title Ar')}}" name="title_ar" required="" >

                                                </div>
                                                <label class="col-form-label">{{__('Description Ar')}} <span style="color: red"> * </span></label>
                                                <textarea required=""  id="description_ar" class="summernote" rows="10" placeholder="{{__('Description Ar')}}" name="description_ar">{{$page->desc_ar}}</textarea>
                                            </div>
                                            @if(in_array('en',$language))
                                                <div class="tab-pane" id="pTitleEn">
                                                    <div class="form-group">
                                                        <label class="col-form-label">{{__('Title En')}}  <span style="color: red"> * </span></label>
                                                        <input type="text" value="{{$page->title_en}}" class="form-control" placeholder="{{__('Title En')}} " name="title_en" required="" >

                                                    </div>
                                                    <label class="col-form-label">{{__('Description En')}} <span style="color: red"> * </span></label>
                                                    <textarea required="" id="description_en" class="summernote" rows="10" placeholder="{{__('Description En')}}" name="description_en">{{$page->desc_en}}</textarea>
                                                </div>
                                            @endif
                                        </div>
                                        <div class=" mt-2">
                                            <button type="submit"  id="save_data" class="btn btn-success bg-purple ">
                                                {{__('Save')}}
                                            </button>
                                        </div>
                                        <div class="clearfix"></div>
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
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/custom/staff-validation.js')}}"></script>
    <!-- END: Page JS-->

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    {{--    <script src="https://mapp.sa/cPanel/libs/summernote/lang/summernote-ar-AR.min.js"></script>--}}
    <script>
        $(document).ready(function () {
            $('#pTitleAr .summernote').summernote({
                lang: "ar-AR",
                tabsize: 2,
                placeholder: 'الوصف',
                height: 200,

                fontsize: '14',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['left', 'center', 'right', 'justify']],

                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'style']],
                    ['height', ['height']],
                    ['insert', ['table', 'hr', 'link']],
                    ['view', ['fullscreen']],//, 'codeview', 'help']],
                ],
                styles: [
                    'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ], styleTags: [
                    'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
                fontSizes: ['16', '18', '20', '22', '24', '32', '34', '36',]
            });

            $('#pTitleEn .summernote').summernote({
                lang: "en-EN",
                tabsize: 2,
                placeholder: 'الوصف انجليزي',
                height: 200,
                fontName: 'SSTArabic-Roman',
                fontsize: '14',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    //   ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['para', ['left', 'center', 'right', 'justify']],

                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph', 'style']],
                    ['height', ['height']],
                    ['insert', ['table', 'hr', 'link']],
                    ['view', ['fullscreen']],//, 'codeview', 'help']],
                ],
                styles: [
                    'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ], styleTags: [
                    'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
                fontSizes: ['16', '18', '20', '22', '24', '32', '34', '36',]
            });

            var max_fields = 15;
            var wrapper = $("#policyAddWrap");
            var add_button = $("#policyAddBtn");
            var x = 1;


            // jQuery("#resetCreateNewForm").click(function () {
            //     jQuery("#createNewTermForm")[0].reset();
            //     jQuery('#collapseCreateNew').collapse('toggle');
            //     jQuery('.new_desc_en').summernote('reset');
            //     jQuery('.new_desc_ar').summernote('reset');
            // });


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

            $(document).on("click", "#save_data", function() {
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
                    $('#save_data').html('');
                    $('#save_data').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('page.update',$page->id)}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#save_data').empty();
                            $('#save_data').html('{{__('Save')}}');
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
                            }, 2000);
                            document.getElementById("SaveData").reset();
                            $('.custom-error').remove();

                        },
                        error: function (data) {
                            $('.custom-error').remove();
                            $('#save_data').empty();
                            $('#save_data').html('{{__('Save')}}');
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
                }
            });

        });

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

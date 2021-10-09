@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-user.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://mapp.sa/cPanel/css/cropper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"  />
{{--    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">--}}

    <style>
        .userImage_upload.userImage {
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            text-align: center;
            border: 1px dashed #e8cef5;
            padding: 10px;
            border-radius: 20px;
        }
        .userImage {
            position: relative;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            margin: 0 auto;
            border: 1px dashed #e8cef5;
            padding: 10px;
            border-radius: 20px;
            display: flex;
            align-items: center;
        }
        .block_logo_insert {
            display: inline-block;
            min-width: 150px;
            min-height: 150px;
            text-align: center;
            border: 1px dashed #e8cef5;
            padding: 10px;
            border-radius: 20px;
        }
        .block_logo_insert {
            position: relative;
            overflow: hidden;
        }
        .upload-btn-wrapper .btn {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #6264b9;
            border-color: #6264b9;
            cursor: pointer;
            border: 1px solid #E1AB39;
            color: #fff;
            border-radius: 50px;
            font-size: 14px;
            width: 40px;
            height: 40px;
            padding: 0;
            text-align: center;
            line-height: 35px;
            background-color: #333744;
            border-color: #333743;
        }

        .upload-btn-wrapper input[type=file] {
            /*font-size: 100px;*/
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
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
                            <h2 class="content-header-title float-left mb-0">{{__('Edit Brand')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('brand.index')}}">{{__('Brand')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('Edit Brand')}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- brand edit start -->
                <section class="app-brand-edit">
                    <div class="card">
                        <div class="card-body">
                            <form  id="editBrandForm" method="POST" enctype="multipart/form-data">
                                <div class="flex-grow-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="brands_categories" id="brands_categories" value="">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="select-country1">{{__('Category')}}</label>
                                                    <select class="select2 categories form-control" name="categories[]" multiple id="categories">
                                                        @foreach($categories as $category)
                                                            <optgroup label="{{App::isLocale('en')?$category->name??$category->name_ar:$category->name_ar??$category->name}}">
                                                                @foreach($category->child as $child)
                                                                    <option value="{{ $child->id}}" {{in_array( $child->id,$categories_id)?'selected':''}} >
                                                                        {{App::isLocale('en')?$child->name??$child->name_ar:$child->name_ar??$child->name}}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <input required="" value="{{$brand->name_ar}}" id="name_ar" type="text" name="name_ar" class="form-control" placeholder="{{__('Name Ar')}}" aria-required="true">
                                                </div>
                                            </div>
                                            @if(in_array('en',$language))
                                            <div class="col-md-12">
                                                <div class="form-group">

                                                    <input required="" value="{{$brand->name}}" id="name" type="text" name="name" class="form-control" placeholder="{{__('Name En')}}" aria-required="true">
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                        <div class=" col-md-6">
                                            <div class="col-md-12">
                                                <div class="block_logo_insert userImage userImage_upload" style="margin-top: 20px;">
                                                    <img src="{{asset('uploads/brands').'/'.$brand->image}}" alt="" id="preview_store_image" style="width: 100%">
                                                    <div class="upload-btn-wrapper">
                                                        <button class="btn"><i class="fa fa-upload"></i></button>
                                                        <input accept="image/*" type="file" id="image" name="image" value="" class="imga" data-hintid="hint">
                                                    </div>

                                                </div>
                                                <div id="imageArea" style="display: none;width: 470px;max-height: 220px;margin-bottom: 50px;">
                                                    <input type="hidden" value="" name="imageDone" id="imageDone" required="" aria-required="true">
                                                    <img id="imagea" src="{{asset('uploads/brands').'/'.$brand->image}}" style="opacity: 0;">
                                                    <button type="button" class="btn btn-success" style="margin: 5px" id="crop"> حفظ
                                                        الصورة
                                                    </button>
                                                    <button type="button" class="btn btn-dark" id="undo">رجوع</button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button   type="button" class="edit_brand btn btn-success waves-effect waves-light">
                                        {{__('Save')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- brand edit ends -->

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
    <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/app-user-edit.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/components/components-navs.js')}}"></script>
    <!-- END: Page JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
{{--    <script src="{{asset('')}}app-assets/custom/market-validation.js"></script>--}}
    <!-- END: Page JS-->

    <script src="https://mapp.sa/cPanel/libs/dropzone/dropzone.min.js"></script>
    <script src="https://mapp.sa/cPanel/js/cropper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            function myHandel(obj, id) {--}}
{{--                if ('responseJSON' in obj)--}}
{{--                    obj.messages = obj.responseJSON;--}}
{{--                $('input,select,textarea').each(function () {--}}
{{--                    var parent = "";--}}
{{--                    if ($(this).parents('.form-group').length > 0)--}}
{{--                        parent = $(this).parents('.form-group');--}}
{{--                    if ($(this).parents('.input-group').length > 0)--}}
{{--                        parent = $(this).parents('.input-group');--}}
{{--                    var name = $(this).attr("name");--}}
{{--                    if (obj.messages && obj.messages[name] && ($(this).attr('type') !== 'hidden')) {--}}
{{--                        var error_message = '<div class="col-md-8 offset-md-3 custom-error"><p style="color: red">' + obj.messages[name][0] + '</p></div>'--}}
{{--                        parent.append(error_message);--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}

{{--            $(document).on("click", ".edit_brand", function() {--}}

{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}

{{--                });--}}
{{--                var postData = new FormData(this.form);--}}
{{--                $('.edit_brand').html('');--}}
{{--                $('.edit_brand').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+--}}
{{--                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');--}}
{{--                $.ajax({--}}
{{--                    url: "{{ route('brand.update',$brand->id)}}",--}}
{{--                    type: "POST",--}}
{{--                    data: postData,--}}
{{--                    processData: false,--}}
{{--                    contentType: false,--}}
{{--                    success: function( response ) {--}}
{{--                        $('.edit_brand').empty();--}}
{{--                        $('.edit_brand').html('{{__('Save Changes')}}');--}}
{{--                        // Toast.fire({--}}
{{--                        //     type: 'success',--}}
{{--                        //     title: response.success--}}
{{--                        // });--}}
{{--                        setTimeout(function () {--}}
{{--                            toastr['success'](--}}
{{--                                response.success,--}}
{{--                                {--}}
{{--                                    closeButton: true,--}}
{{--                                    tapToDismiss: false--}}
{{--                                }--}}
{{--                            );--}}
{{--                        }, 200);--}}
{{--                        // document.getElementById("mainAdd").reset();--}}
{{--                        $('.custom-error').remove();--}}

{{--                    },--}}
{{--                    error: function (data) {--}}
{{--                        $('.custom-error').remove();--}}
{{--                        $('.edit_brand').empty();--}}
{{--                        $('.edit_brand').html('{{__('Save')}}');--}}
{{--                        var response = data.responseJSON;--}}
{{--                        if (data.status == 422) {--}}
{{--                            if (typeof(response.responseJSON) != "undefined") {--}}
{{--                                myHandel(response);--}}
{{--                                setTimeout(function () {--}}
{{--                                    toastr['error'](--}}
{{--                                        response.message,--}}
{{--                                        {--}}
{{--                                            closeButton: true,--}}
{{--                                            tapToDismiss: false--}}
{{--                                        }--}}
{{--                                    );--}}
{{--                                }, 2000);--}}
{{--                            }--}}
{{--                        } else {--}}
{{--                            Toast.fire({--}}
{{--                                icon: 'error',--}}
{{--                                title: response.message--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}

{{--        });--}}

{{--    </script>--}}
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


        });

    </script>
{{--    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>--}}
{{--    <script src="https://mapp.sa/cPanel/js/validate.js"></script>--}}
{{--    <script src="https://mapp.sa/cPanel/libs/dropify/dropify.min.js"></script>--}}
{{--    <script src="https://mapp.sa/cPanel/js/pages/form-fileuploads.init.js"></script>--}}
{{--    <script src="https://mapp.sa/cPanel/js/cropper.js"></script>--}}
{{--    <script>--}}

{{--        var validator =$('#editBrandForm').validate({--}}
{{--            errorElement: 'div', //default input error message container--}}
{{--            errorClass: 'abs_error help-block has-error',--}}
{{--            rules:{--}}
{{--                brand_name_ar: {--}}
{{--                    required: true,--}}
{{--                },--}}
{{--                brand_name_en: {--}}
{{--                    required: true,--}}
{{--                },--}}

{{--                'categories[]': 'required',--}}
{{--            },--}}
{{--            messages: {--}}
{{--                brand_name_ar: {--}}
{{--                    required: 'هذا الحقل مطلوب',--}}
{{--                },--}}

{{--                brand_name_en: {--}}
{{--                    required: 'هذا الحقل مطلوب',--}}
{{--                },--}}

{{--                "categories[]": 'اختر تصنيف واحد على الاقل',--}}

{{--                image: {--}}

{{--                },--}}

{{--            },--}}
{{--            errorPlacement: function (error, element) {--}}
{{--                //Custom position: first name--}}
{{--                console.log(error);--}}
{{--                if (element.hasClass("select2")){--}}

{{--                    error.insertAfter(element.siblings(".select2-container"));--}}
{{--                }--}}
{{--                else if (element.hasClass("dropify")) {--}}
{{--                    error.insertAfter(element.parent(".dropify-wrapper"));--}}

{{--                } else {--}}
{{--                    error.insertAfter(element);--}}
{{--                }--}}

{{--            },--}}
{{--        }).init();--}}
{{--        var _URL = window.URL || window.webkitURL;--}}


{{--    </script>--}}
    <script>
        var input = document.getElementById('image');
        var image = document.getElementById('imagea');
        var widebanner_formData = new FormData();
        var cropper;
        var cropBoxData = document.querySelector('#imageArea');
        var avatar = document.getElementById('preview_store_image');
        var avatar_src = avatar.src;
        var  bannerForm=$('#editBrandForm');
        var actionForm = bannerForm.attr('action');
        var UrlForm = bannerForm.data('url');
        $('#imagea').css('opacity', 0);
        input.addEventListener('change', function (e) {
            $('#imagea').css('opacity', 0);
            $('#image-error').remove();
            var files = e.target.files;
            var done = function (url) {
                input.value = '';
                image.src = url;

            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }


            cropper = new Cropper(image, {

                aspectRatio:  2/1,

                ready: function () {
                    //Should set crop box data first here
                    cropper.setCropBoxData(cropBoxData);
                },

            });
            $('.block_logo_insert').hide();
            $('#imageArea').show();
        });
        $('#crop').click(function (e) {
            $('#imagea').css('opacity', 0);
            var initialAvatarURL;
            var canvas;

            if (cropper) {
                canvas = cropper.getCroppedCanvas({
                    width: 200,
                    height: 200,
                });
                initialAvatarURL = avatar.src;
                avatar.src =  canvas.toDataURL();
                canvas.toBlob(function (blob) {
                    widebanner_formData.append('image', blob, 'avatar.jpg');
                    $('#imageDone').val('done');
                });
            }

            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
            $('.block_logo_insert').show();
            $('#imageArea').hide();
        });
        $('#undo').click(function (e) {
            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
            //  $('#imagea').src='';
            $('#imagea').css('opacity', 0);
            $('#imageDone').val('');
            avatar.src =  avatar.src;

            $('#imageArea').hide();
            $('.block_logo_insert').show();

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

        $(document).ready(function () {

            var loader = $('#loader-modal');
            $('.edit_brand').click(function () {
                // loader.fadeIn(200);
                var $form = $(this.form);
                if (!$form.valid()) {
                    return false
                }
                if ($form.valid()) {
                $('#image-error').remove();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.has-error').remove();

                widebanner_formData.append("_method", 'POST'); // Append all the additional input data of your form here!
                var mySelections = [];
                // var x = 0;
                $('.select2 option').each(function (i) {
                    if (this.selected == true) {
                        widebanner_formData.append("categories[]", this.value); // Append all the additional input data of your form here!
                    }
                });
                // console.log(mySelections);
                widebanner_formData.append("_token", $('input[name="_token"]').val()); // Append all the additional input data of your form here!
                widebanner_formData.append("name_ar", $('input[name="name_ar"]').val()); // Append all the additional input data of your form here!
                widebanner_formData.append("name", $('input[name="name"]').val()); // Append all the additional input data of your form here!
                $('.edit_brand').html('');
                $('.edit_brand').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                    '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                $.ajax({
                    method: 'POST',
                    url: '{{ route('brand.update',$brand->id)}}',
                    data: widebanner_formData,
                    processData: false,
                    contentType: false,

                    xhr: function () {
                        var xhr = new XMLHttpRequest();

                        xhr.upload.onprogress = function (e) {
                            var percent = '0';
                            var percentage = '0%';

                            if (e.lengthComputable) {
                                percent = Math.round((e.loaded / e.total) * 100);
                                percentage = percent + '%';
                            }
                        };

                        return xhr;
                    },

                    success: function (data) {
                        if (data.status == 1) {
                            widebanner_formData = new FormData()
                            $('.edit_brand').empty();
                            $('.edit_brand').html('{{__('Save Changes')}}');
                            setTimeout(function () {
                                toastr['success'](
                                    data.success,
                                    {
                                        closeButton: true,
                                        tapToDismiss: false
                                    }
                                );
                            }, 200);
                            $('.custom-error').remove();
                            // swal({
                            //     title: data.message,
                            //     type: 'success'
                            // }, function () {
                            //     window.location.href = UrlForm;
                            // });
                            // window.location.href = UrlForm;


                        } else if (data.errors) {
                            loader.fadeOut(200);
                            var errors = data.errors;
                            console.log(errors);
                            var errorsHtml = '';
                            $.each(errors, function (index, value) {
                                $('.wide_banner_' + index).parent().parent().append('<span class="help-block has-error"> <strong>' + value + '</strong></span>');
                            });
                        } else {
                            swal.fire({
                                title: data.message,
                                type: 'error'
                            })
                        }
                    },

                    error: function (data) {
                        $('.custom-error').remove();
                        $('.edit_brand').empty();
                        $('.edit_brand').html('{{__('Save')}}');
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
                    },

                    complete: function () {
                        //$progress.hide();
                    },
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

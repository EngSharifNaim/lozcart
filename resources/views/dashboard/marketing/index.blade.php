@extends('dashboard.layouts.app')
@section('style')
    <script type="text/javascript">
        // Notice how this gets configured before we load Font Awesome
        window.FontAwesomeConfig = { autoReplaceSvg: false }
    </script>
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    <link href="{{asset('/emoji-picker-master/lib/css/emoji.css')}}" rel="stylesheet">
    <style>
        .english-dir {
            direction: ltr !important;
        }

        .emoji-wysiwyg-editor {
            height: 120px !important;
            min-height: 120px !important;
            padding-right: 6px !important;
        }

        #value_text-error {
            color: red;
            text-align: center;
            font-size: 10px;
        }


        .userImage #value_text-error {
            width: 106%;
        }

        .emoji-picker-icon {
            bottom: 7px;
            right: 7px !important;
            top: unset !important;
        }

        .link-icon {
            bottom: 7px;
            right: 20px !important;
            top: unset !important;
            position: absolute;
        }

        .notification-bar {
            position: relative;
            padding: 10px;
        }

        .notification-bar .close {
            right: 10px;
            left: auto;
            position: absolute;
            top: 10px;
        }

        .notification-bar p {
            font-size: 1rem;
            margin: 0;
            text-align: center;
        }
        .notification-bar_en p {
            font-size: 1rem;
            margin: 0;
            text-align: center;
        }

        .notification-bar a {
            position: relative;
        }
        ..notification-bar_en a {
            position: relative;
        }
        .switch{
            position: absolute;
            top: -25px;
            right: 0;
        }
        #counter{
            position: absolute;
            bottom: 22px;
            left: 20px;

        }
        #counter_en {
            position: absolute;
            bottom: 22px;
            left: 20px;
        }
        .emoji-picker-container_en .emoji-picker-icon {
            bottom: 20px;
            right: 20px !important;
            top: unset !important;
        }
        .notification-bar_en {
            position: relative;
            padding: 10px;
        }
        .notification-bar_en .close {
            right: 10px;
            left: auto;
            position: absolute;
            top: 10px;
        }
    </style>
    @if (App::isLocale('en'))
    @else
        <style>
            .switch{
                position: absolute;
                top: -25px;
                right: unset;
                left: 0;
            }
        </style>
    @endif
    <style>
        .emoji-picker-icon{
            z-index:0;
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
                            <h2 class="content-header-title float-left mb-0">{{__('NavBar')}}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{__('NavBar')}}
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
                                    <h4 class="card-title">{{__('Edit NavBar')}}</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" id="updateNavBar">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label >{{__('Text NavBar')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <p class="lead emoji-picker-container">
                                            <textarea maxlength="60" required class="form-control m-input m-input--pill m-input--air"
                                                      name="text" id="banner_content" data-emojiable="true"
                                                      data-emoji-input="unicode" rows="3"
                                                      placeholder="{{__('Marketing message example: We have free shipping available')}}">{{$navbar->text??''}}</textarea>
                                                <div id="counter" ></div>
                                                </p>
                                                <div class="btn mr-2 switch" >
                                                    <div style="display: inline-block"
                                                         class="custom-control custom-switch text-right ">
                                                        <input type="checkbox" name="status" {{$navbar->status??'' ==1?'checked':''}} class="custom-control-input" id="status">
                                                        <label class="custom-control-label" for="status"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(in_array('en',$language))
                                            <div class="form-group col-md-12 mb-2">
                                                <label >{{__('Text NavBar En')}}
                                                    <span style="color: red"> * </span>
                                                </label>
                                                <p class="lead emoji-picker-container_en">
                                            <textarea maxlength="60" required class="form-control m-input m-input--pill m-input--air"
                                                      name="text_en" id="banner_content_en" data-emojiable="f"
                                                      data-emoji-input="unicode" rows="3"
                                                      placeholder="{{__('Marketing message example: We have free shipping available (english)')}}">{{$navbar->text_en??''}}</textarea>
                                                <div id="counter_en" ></div>
                                                </p>
                                            </div>
                                            @endif
                                            <div class="form-group col-md-3 mb-2">
                                                <label >{{__('Background Color NavBar')}}</label>
                                                <input id="banner_color" name="color" class="jscolor form-control"
                                                       onchange="update3(this.jscolor)"
                                                       value="{{$navbar->color ??'#FF0D2D'}}">

                                            </div>
                                            <div class="form-group col-md-9 mb-2">
                                                <label > {{__('Link')}}</label>
                                                <input id="banner_link" name="link" autocomplete="new-link" class=" form-control "  value="{{$navbar->link ??''}}">

                                            </div>
                                            <div class="col-md-12">
                                                <div class="previewColrs">
                                                    <div class="mt-3">
                                                        <h4 class="text-center">{{__('Preview NavBar')}}</h4>

                                                        <div class="info notification-bar" style="min-height:44px;">
                                                            <a href="{{$navbar->link ??'#'}}">
                                                                <p id="rectText" style="font-size: 16px;color: #fff;">{{$navbar->text??''}}</p>
                                                            </a>
                                                            <button type="button" class="close btn" style="color: rgb(0, 0, 0);">×</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @if(in_array('en',$language))
                                            <div class="col-md-12">
                                                <div class="previewColrs_en">
                                                    <div class="mt-3">
                                                        <h4 class="text-center">{{__('Preview NavBar En')}}</h4>

                                                        <div class="info notification-bar_en" style="min-height:44px;">
                                                            <a href="{{$navbar->link ??'#'}}">
                                                                <p id="rectText_en" style="font-size: 16px;color: #fff;">{{$navbar->text_en??''}}</p>
                                                            </a>
                                                            <button type="button" class="close btn" style="color: rgb(0, 0, 0);">×</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="form-group col-md-12 mt-4 ">
                                                <button class="btn btn-success" type="button"   id="update_navbar" >{{__('Save')}}</button>
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
    <script src="{{asset('/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" ></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{asset('/app-assets/custom/staff-validation.js')}}"></script>
    <!-- END: Page JS-->

    <script src="{{asset('/app-assets/custom/jscolor.js')}}"></script>
    <script src="{{asset('emoji-picker-master/lib/js/config.js')}}"></script>
    <script src="{{asset('emoji-picker-master/lib/js/util.js')}}"></script>
    <script src="{{asset('emoji-picker-master/lib/js/jquery.emojiarea.js')}}"></script>
    <script src="{{asset('emoji-picker-master/lib/js/emoji-picker.js')}}"></script>

    <script>
        $(function () {
            // Initializes and creates emoji set from sprite sheet
            var assetsPath = '{{asset('emoji-picker-master/lib/img')}}';
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=true]',
                assetsPath: assetsPath,
                popupButtonClasses: 'far fa-smile'
            });
            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
            // It can be called as many times as necessary; previously converted input fields will not be converted again
            window.emojiPicker.discover();
        });
    </script>
    <script>
        $(function () {
            // Initializes and creates emoji set from sprite sheet
            var assetsPath = '{{asset('emoji-picker-master/lib/img')}}';
            window.emojiPicker = new EmojiPicker({
                emojiable_selector: '[data-emojiable=f]',
                assetsPath: assetsPath,
                popupButtonClasses: 'far fa-smile'
            });
            // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
            // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
            // It can be called as many times as necessary; previously converted input fields will not be converted again
            window.emojiPicker.discover();
        });
    </script>
    <script>
        $(document).ready(function () {
            // document.querySelector('#rectText').innerHTML = $('#banner_content').val();
            if ($('#banner_content').val() == '') {
                var jscolor = 'FF0D2D';

            } else {
                var jscolor = $('#banner_color').val();

            }
            // console.log($('#banner_content').val())
            document.querySelector('.notification-bar').style.backgroundColor = '#' + jscolor;
            var Characters = $('#banner_content').val().length; // '$' is missing from the selector

            $("#counter").text((60 - Characters) + '/60');
        });


        function update3(jscolor) {
            // 'jscolor' instance can be used as a string

            document.querySelector('#rectText').innerHTML = $('#banner_content').val();
            document.querySelector('.notification-bar').style.backgroundColor = '#' + jscolor
        }

        function update() {
            // 'jscolor' instance can be used as a string
            if ($('.emoji-wysiwyg-editor').text() == '') {
                var jscolor = 'FFFFFF';

            } else {
                var jscolor = $('#banner_color').val();

            }
            console.log($('#banner_content').val()+'hghf')
            document.querySelector('#rectText').innerHTML = $('.emoji-picker-container .emoji-wysiwyg-editor').text();
            document.querySelector('.notification-bar').style.backgroundColor = '#' + jscolor;

        }

        $(document).ready(function () {
            $('body').on('DOMSubtreeModified', '.emoji-picker-container .emoji-wysiwyg-editor', function (e) {
                $('#banner_content').focus();
                var last_Chars = '';
                var Characters = $('.emoji-picker-container .emoji-wysiwyg-editor').text().length; // '$' is missing from the selector

                var imgs_counter = 0;
                $('.emoji-picker-container .emoji-wysiwyg-editor img').each(function () {
                    imgs_counter++;
                });
                console.log(imgs_counter);
                if ((60 - (Characters + imgs_counter * 2)) >= 0) {
                    $("#counter").text((60 - (Characters + imgs_counter * 2)) + '/60');
                }

                update();

            });
        });

    </script>
    <script>
        @if(in_array('en',$language))
        $(document).ready(function () {
            document.querySelector('#rectText_en').innerHTML = $('#banner_content_en').val();
            if ($('#banner_content_en').val() == '') {
                var jscolor = 'FFFFFF';

            } else {
                var jscolor = $('#banner_color').val();

            }
            document.querySelector('.notification-bar_en').style.backgroundColor = '#' + jscolor;
            var Characters = $('#banner_content_en').val().length; // '$' is missing from the selector

            $("#counter_en").text((60 - Characters) + '/60');
        });
        @endif

        function update3(jscolor) {
            console.log($('.emoji-picker-container .emoji-wysiwyg-editor').text())
            // 'jscolor' instance can be used as a string
            document.querySelector('#rectText').innerHTML = $('#banner_content').val();
            document.querySelector('.notification-bar').style.backgroundColor = '#' + jscolor
            @if(in_array('en',$language))
            document.querySelector('#rectText_en').innerHTML = $('#banner_content_en').val();
            document.querySelector('.notification-bar_en').style.backgroundColor = '#' + jscolor
            @endif
        }

        function update() {
            console.log($('.emoji-picker-container .emoji-wysiwyg-editor').text())
            // 'jscolor' instance can be used as a string
            if ($('.emoji-picker-container_en .emoji-wysiwyg-editor').text() == '') {
                var jscolor = 'FFFFFF';

            } else {
                var jscolor = $('#banner_color').val();

            }
            document.querySelector('#rectText').innerHTML = $('.emoji-picker-container .emoji-wysiwyg-editor').text();
            @if(in_array('en',$language))
            document.querySelector('#rectText_en').innerHTML = $('.emoji-picker-container_en .emoji-wysiwyg-editor').text();
            document.querySelector('.notification-bar_en').style.backgroundColor = '#' + jscolor;
            @endif

        }

        $(document).ready(function () {
            $('body').on('DOMSubtreeModified', '.emoji-picker-container_en .emoji-wysiwyg-editor', function (e) {
                $('#banner_content_en').focus();
                var last_Chars = '';
                var Characters = $('.emoji-picker-container_en .emoji-wysiwyg-editor').text().length; // '$' is missing from the selector

                var imgs_counter = 0;
                $('.emoji-picker-container_en .emoji-wysiwyg-editor img').each(function () {
                    imgs_counter++;
                });
                console.log(imgs_counter);
                @if(in_array('en',$language))
                if ((60 - (Characters + imgs_counter * 2)) >= 0) {
                    $("#counter_en").text((60 - (Characters + imgs_counter * 2)) + '/60');
                }
                @endif

                update();

            });
        });

    </script>

    {{--edit data --}}
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

            $(document).on("click", "#update_navbar", function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
                var $form = $(this.form);
                if(! $form.valid()) {
                    return false
                };
                if ($form.valid()) {
                    var postData = new FormData(this.form);
                    $('#update_navbar').html('');
                    $('#update_navbar').append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
                        '<span class="ml-25 align-middle">{{__('Saving')}}...</span>');
                    $.ajax({
                        url: "{{ route('marketing.navbar_update')}}",
                        type: "POST",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#update_navbar').empty();
                            $('#update_navbar').html('{{__('Save')}}');
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
                            $('#update_navbar').empty();
                            $('#update_navbar').html('{{__('Save')}}');
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
    <script>
        $(document).ready(function() {

            // $form = $('#form_data');
            $(function () {
                'use strict';

                var updateNavBar = $('#updateNavBar');
// console.log(addClient)
                // jQuery Validation
                // --------------------------------------------------------------------
                if (updateNavBar.length) {
                    updateNavBar.validate({

                        rules: {

                            text: {
                                required: true,
                            },
                            @if(in_array('en',$language))
                            text_en: {
                                required: true,
                            },
                            @endif



                        }
                    });
                }
            });
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
